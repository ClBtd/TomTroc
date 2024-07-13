<?php

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
        $newBooks = $this->bookManager->getNewBooks();     

        $view = new View("Accueil");
        $view->render("home",['newBooks' => $newBooks]);
    }

    public function showBooks() : void
    {
        $books = $this->bookManager->getAllBooks();     

        $view = new View("Nos livres à l'échange");
        $view->render("books",['books' => $books]);
    }

    public function searchBooks() : void
    {
        $searchedBooks = htmlspecialchars($_GET['title']);

        $books = $this->bookManager->getSearchedBooks($searchedBooks);     

        $view = new View("Nos livres à l'échange");
        $view->render("books",['books' => $books]);   
    }

    public function showBookDetail() : void
    {
        $bookId = htmlspecialchars($_GET['bookId']);

        $book = $this->bookManager->getBookById($bookId);     

        $view = new View("Titre du livre");
        $view->render("bookDetail", ['book' => $book]);
    }

    public function bookForm() : void
    {

            //On récupère les infos du livre.
            $book = $this->bookManager->getBookById(htmlspecialchars($_GET['id']));

            // Puis on affiche le formulaire pour les livres.
            $view = new View("Edition du livre");
            $view->render("bookUpdateForm", ['book' => $book]);

    }

    /**
     * Modifiaction des infos du livre.
     * @return void
     */
    public function updateBook() : void 
    {
        // On récupère les données du formulaire.
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

        //On modifie les informations du livre.
        $result = $this->bookManager->updateBook($book);

        // On vérifie que la modification a bien fonctionné.
        if (!$result) {
            throw new Exception("Une erreur est survenue lors de l'ajout du livre.");
        }

        // On redirige vers la page de compte.
        Utils::redirect("account", ["success"=>3]);
    }

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

    public function bookAddForm() : void
    {
            // On affiche le formulaire pour les livres.
            $view = new View("Edition du livre");
            $view->render("bookAddForm");
    }

    /**
     * Création d'un compte utilisateur.
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
     * Page de chargement d'une image.
     * @return void
     */
    public function cover() : void 
    {
        // On vérifie que l'utilisateur est connecté.
        Utils::checkIfUserIsConnected();

        // On affiche la page de téléchargement de l'image.
        $view = new View("Image de couverture");
        $view->render("cover");
    }

    /**
     * Page d'ajout d'une image.
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