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
}