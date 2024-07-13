<?php

class UserController {


    private $userManager;
    /**
     * Définition du constructeur
     * @return UserManager
     */
    public function __construct(UserManager $userManager)
    {
        $this->userManager = $userManager;
    }

    /**
     * Affiche la page d'administration.
     * @return void
     */
    public function showAccount() : void
    {
        // On vérifie que l'utilisateur est connecté et on récupère son mail.
        Utils::checkIfUserIsConnected();
        $email = $_SESSION['userEmail'];

        // On récupère les informations de l'utilisateur et ses livres.
        $userInfos = $this->userManager->getUserInfos($email);
        if (!$userInfos) {
            throw new Exception("Un problème est survenu lors de l'accès aux informations du compte.");
        }

        //On récupère les livres de l'utilisateur.
        $userBooks = new BookManager;
        $userBooks = $userBooks->getBooksByUser($email);

        // On affiche la page utilisateur.
        $view = new View("Mon compte");
        $view->render("account", ['userInfos' => $userInfos,
        'userBooks' => $userBooks]);
    }

    /**
     * Affichage du formulaire de connexion.
     * @return void
     */
    public function displayConnectionForm() : void 
    {
        $view = new View("Connexion");
        $view->render("connectionForm");
    }

    /**
     * Affichage du formulaire d'inscription.
     * @return void
     */
    public function displayInscriptionForm() : void 
    {
        $view = new View("Inscription");
        $view->render("inscriptionForm");
    }

    /**
     * Connexion de l'utilisateur.
     * @return void
     */
    public function connectUser() : void 
    {
        // On récupère les données du formulaire.
        $email = Utils::request("email");
        $password = Utils::request("password");

        // On vérifie que les données sont valides.
        if (empty($email) || empty($password)) {
            throw new Exception("Tous les champs sont obligatoires. 1");
        }

        // On vérifie que l'utilisateur existe.
        $user = $this->userManager->getUserByEmail($email);
        if (!$user) {
            throw new Exception("L'utilisateur demandé n'existe pas.");
        }

        // On vérifie que le mot de passe est correct.
        if (!password_verify($password,$user->getPassword())) {
            throw new Exception("Le mot de passe est incorrect.");
        }

        // On connecte l'utilisateur.
        $_SESSION['user'] = $user;
        $_SESSION['userEmail'] = $user->getEmail();

        // On redirige vers la page du compte de l'utilisateur..
        Utils::redirect("account");
    }

    /**
     * Déconnexion de l'utilisateur.
     * @return void
     */
    public function disconnectUser() : void 
    {
        // On déconnecte l'utilisateur.
        unset($_SESSION['user']);

        // On redirige vers la page d'accueil.
        Utils::redirect("home");
    }

    /**
     * Création d'un compte utilisateur.
     * @return void
     */
    public function recordUser() : void 
    {
        // On récupère les données du formulaire.
        $login = Utils::request("login");
        $email = Utils::request("email");
        $password = Utils::request("password");

        // On vérifie que les données sont valides.
        if (empty($login) || empty($email) || empty($password)) {
            throw new Exception("Tous les champs sont obligatoires.");
        }

        // On vérifie que l'utilisateur n'existe pas.
        $userEmail = $this->userManager->getUserByEmail($email);
        if ($userEmail) {
            throw new Exception("Cet email est déjà associé à un compte.");
        }

        // On vérifie que le login est disponible.
        $userLogin = $this->userManager->getUserByLogin($login);
        if ($userLogin) {
            throw new Exception("Ce pseudo n'est pas disponible.");
        }

        //On crée un objet utilisateur.
        $user = new User([
            'login' => $login,
            'email' => $email,
            'password' => password_hash($password, PASSWORD_DEFAULT)
        ]);

        //On ajoute le nouvel utilisateur.
        $result = $this->userManager->createUser($user);

        // On vérifie que l'ajout a bien fonctionné.
        if (!$result) {
            throw new Exception("Une erreur est survenue lors de la création du compte.");
        }

        // On redirige vers la page de connexion.
        Utils::redirect("connectionForm", ["success" => 1]);
    }

    /**
     * Page de chargement d'une image.
     * @return void
     */
    public function picture() : void 
    {
        // On vérifie que l'utilisateur est connecté.
        Utils::checkIfUserIsConnected();

        // On affiche la page de téléchargement de l'image.
        $view = new View("Image de profil");
        $view->render("picture");
    }

    /**
     * Page d'ajout d'une image.
     * @return void
     */
    public function loadPicture() : void 
    {
        // On vérifie que l'utilisateur est connecté.
        Utils::checkIfUserIsConnected();

        //On vérifie qu'un fichier a bien été chargé
        $picture = $_FILES['picture'];
        if (empty($picture)) {
            throw new Exception("Aucun fichier n'a été déposé.");
        } 

        // On vérifie le format de l'image et on répcupère l'extension.
        $finfo = new finfo();
        $info = $finfo->file($picture['tmp_name'], FILEINFO_MIME_TYPE);
        if ($info === 'image/jpeg') {
            $ext = '.jpg';
        }
        elseif ($info === 'image/png') {
            $ext = '.png';
        }
        else {
            throw new Exception("Ce format n'est pas accepté.");
        }

        //On récupère le nom de l'utilisateur pour créer le nom du fichier.
        $userInfos = $this->userManager->getUserByEmail($_SESSION['userEmail']);
        $userName = $userInfos->getLogin();
        $fileName = Utils::sanitizeFilename($userName);

        //On cherche si une image est déjà chargée. 
        $userPicture = $userInfos->getPicture();
        if ($userPicture) {
            $existing = true;
        }
        else $existing = false;

        //On charge la nouvelle image et on supprime l'ancienne si elle existe
        $result = $this->userManager->uploadPicture($picture['tmp_name'], $fileName, $ext, $userInfos->getId(), $existing);

        // On vérifie que la modification a bien fonctionné.
        if (!$result) {
            throw new Exception("Une erreur est survenue lors du chargement de l'image.");
        }

        // On redirige vers la page de compte.
        Utils::redirect("account", ["success"=>1, "results"=>$fileName]);
    }

    /**
     * Modifiaction des infos utilisateur.
     * @return void
     */
    public function updateUser() : void 
    {
        // On récupère les données du formulaire.
        $id = htmlspecialchars(Utils::request("id"));
        $login = htmlspecialchars(Utils::request("login"));
        $email = htmlspecialchars(Utils::request("email"));
        $password = htmlspecialchars(Utils::request("password"));

        // On vérifie que le login est disponible.
        $userLogin = $this->userManager->getUserByLogin($login);
        if ($userLogin) {
            $user1 = $userLogin->getLogin();
            $userMail = $this->userManager->getUserByEmail($email);
            $user2 = $userMail->getLogin();
            if ($user1 !== $user2) {
                throw new Exception("Ce pseudo n'est pas disponible.");
            }
        }
        

        //On crée un objet utilisateur.
        $user = new User([
            'id' => $id,
            'login' => $login,
            'email' => $email,
        ]);

        if (!empty($password)) {
            $user->setPassword(password_hash($password, PASSWORD_DEFAULT));
        }

        //On modifie le profil de l'utilisateur.
        $result = $this->userManager->updateUser($user);

        // On vérifie que la modification a bien fonctionné.
        if (!$result) {
            throw new Exception("Une erreur est survenue lors de la modification des informations du compte.");
        }

        //On change le mail de session 
        $_SESSION['userEmail'] = $email;

        // On redirige vers la page de compte.
        Utils::redirect("account", ["success"=>2]);
    }

}