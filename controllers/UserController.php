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
        // On vérifie que l'utilisateur est connecté.
        Utils::checkIfUserIsConnected();

        // On récupère les articles.
        //$articleManager = new ArticleManager();
        //$articles = $articleManager->getAllArticles();

        // On affiche la page d'administration.
        $view = new View("Mon compte");
        $view->render("account");
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
        if (!password_verify($password, $user->getPassword())) {
            throw new Exception("Le mot de passe est incorrect.");
        }

        // On connecte l'utilisateur.
        $_SESSION['user'] = $user;
        $_SESSION['idUser'] = $user->getId();

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
            throw new Exception("Une erreur est survenue lors de l'ajout du commentaire.");
        }

        // On redirige vers la page de connexion.
        Utils::redirect("connectionForm");
    }


}