<?php

/* Contrôleur relatif aux livres */

class BookController 
{
    private $bookManager;

    /**
     * Définition du constructeur
     * @return BookManager
     */
    public function __construct(BookManager $bookManager)
    {
        $this->bookManager = $bookManager;
    }

    /**
     * Affiche la page d'accueil.
     * @return void
     */
    public function showHome() : void
    {

        /*On récupère les derniers livres ajoutés par les utilisateurs et disponibles à l'échange.*/
        $newBooks = $this->bookManager->getNewBooks();     

        $view = new View("Accueil");
        $view->render("home",['newBooks' => $newBooks]);
    }

    /**
     * Affiche la page récapitulative des livres.
     * @return void
     */
    public function showBooks() : void
    {
        /* On récupère tous les livres de la base de donnée. */
        $books = $this->bookManager->getAllBooks();     

        $view = new View("Nos livres à l'échange");
        $view->render("books",['books' => $books]);
    }

    /**
     * Affiche le résultat de la recherche utilisateur.
     * @return void
     */
    public function searchBooks() : void
    {
        /* On récupère le titre entré par l'utilisateur. */
        $searchedBooks = htmlspecialchars($_GET['title']);

        /*On récupère les résultats correspondants dans la base de donnée.*/
        $books = $this->bookManager->getSearchedBooks($searchedBooks);     

        $view = new View("Nos livres à l'échange");
        $view->render("books",['books' => $books]);   
    }

    /**
     * Affiche la page de détail d'un livre via son ID.
     * @return void
     */
    public function showBookDetail() : void
    {

        /*On récupère l'id du livre. */
        $bookId = htmlspecialchars($_GET['bookId']);

        /*On récupère les informations sur le livre dans la base de donnée. */
        $book = $this->bookManager->getBookById($bookId);     

        $view = new View("Titre du livre");
        $view->render("bookDetail", ['book' => $book]);
    }

    /**
     * Affiche la page de modification des informations du livre.
     * @return void
     */
    public function bookForm() : void
    {

        //On récupère les infos du livre dans la base de donnée via son ID.
        $book = $this->bookManager->getBookById(htmlspecialchars($_GET['id']));

        $view = new View("Edition du livre");
        $view->render("bookUpdateForm", ['book' => $book]);

    }

    /**
     * Modifiaction des infosrmations du livre.
     * @return void
     */
    public function updateBook() : void 
    {
        // On récupère les données du formulaire de modification.
        $id = htmlspecialchars(Utils::request("id"));
        $title = htmlspecialchars(Utils::request("title"));
        $author = htmlspecialchars(Utils::request("author"));
        $description = htmlspecialchars(Utils::request("description"));
        $disponibility = Utils::request("disponibility");
        

        //On crée un objet livre.
        $book = new Book([
            'id' => $id,
            'title' => $title,
            'author' => $author,
            'description' => $description,
            'disponibility' => $disponibility
        ]);

        //On modifie les informations du livre dans la base de donnée.
        $result = $this->bookManager->updateBook($book);

        // On vérifie que la modification a bien fonctionné.
        if (!$result) {
            throw new Exception("Une erreur est survenue lors de l'ajout du livre.");
        }

        // On redirige vers la page de compte.
        Utils::redirect("account", ["success"=>3]);
    }

    /**
     * Suppression d'un livre.
     * @return void
     */
    public function deleteBook() : void
    {
        //On récupère l'id du livre et le nom du fichier image s'il y en a un.
        $bookId = htmlspecialchars($_GET['id']);
        $book = $this->bookManager->getBookById($bookId);
        $cover = $book->getCover();

        //On supprime le livre.
        $result = $this->bookManager->deleteBook($bookId, $cover);  
        if (!$result) {
            throw new Error("Une erreur s'est produite lors de la suppression du livre.");
        }

        // On redirige vers la page de compte.
        Utils::redirect("account", ["success"=>4]);
    }

    /**
     * Affiche le formulaire d'ajout d'un livre.
     * @return void
     */
    public function bookAddForm() : void
    {
       $view = new View("Edition du livre");
        $view->render("bookAddForm");
    }

    /**
     * Ajout d'un livre.
     * @return void
     */
    public function addBook () : void 
    {
        // On récupère les données du formulaire.
        $title = htmlspecialchars(Utils::request("title"));
        $author = htmlspecialchars(Utils::request("author"));
        $description = htmlspecialchars(Utils::request("description"));
        $disponibility = Utils::request("disponibility");

        // On vérifie que les données sont valides.
        if (empty($title) || empty($author) || empty($description))  {
            throw new Exception("Tous les champs sont obligatoires.");
        }

        //On récupère l'id de l'utilisateur
        $userManager = new UserManager;
        $user = $userManager->getUserByEmail($_SESSION['userEmail']);
        $user_id = $user->getId();

        //On crée un objet livre.
        $book = new Book([
            'title' => $title,
            'author' => $author,
            'description' => $description,
            'disponibility' => $disponibility,
            'user_id' => $user_id
        ]);

        //On ajoute le nouveau livre.
        $result = $this->bookManager->addBook($book);

        // On vérifie que l'ajout a bien fonctionné.
        if (!$result) {
            throw new Exception("Une erreur est survenue lors de l'ajout du livre.");
        }

        // On redirige vers la page de connexion.
        Utils::redirect("account", ["success"=>5]);
    }

    /**
     * Affiche la page de chargement d'une image.
     * @return void
     */
    public function cover() : void 
    {
        // On vérifie que l'utilisateur est connecté.
        Utils::checkIfUserIsConnected();

        $view = new View("Image de couverture");
        $view->render("cover");
    }

    /**
     * Ajout d'une image.
     * @return void
     */
    public function loadCover() : void 
    {
        // On vérifie que l'utilisateur est connecté.
        Utils::checkIfUserIsConnected();

        //On vérifie qu'un fichier a bien été chargé
        $cover = $_FILES['cover'];
        if (empty($cover)) {
            throw new Exception("Aucun fichier n'a été déposé.");
        } 

        // On vérifie le format de l'image et on répcupère l'extension.
        $finfo = new finfo();
        $info = $finfo->file($cover['tmp_name'], FILEINFO_MIME_TYPE);
        if ($info === 'image/jpeg') {
            $ext = '.jpg';
        }
        elseif ($info === 'image/png') {
            $ext = '.png';
        }
        else {
            throw new Exception("Ce format n'est pas accepté.");
        }

        //On récupère le titre du livre pour créer le nom du fichier.
        $bookInfos = $this->bookManager->getBookById(Utils::request('id'));
        $title = $bookInfos->getTitle();
        $fileName = Utils::sanitizeFilename($title);

        //On cherche si une image est déjà chargée. 
        $bookCover = $bookInfos->getCover();
        if ($bookCover) {
            $existing = true;
        }
        else $existing = false;

        //On charge la nouvelle image et on supprime l'ancienne si elle existe
        $this->bookManager->uploadCover($cover['tmp_name'], $fileName, $ext, $bookInfos->getId(), $existing);

        // On redirige vers la page de compte.
        Utils::redirect("account", ["success"=>1]);
    }
}