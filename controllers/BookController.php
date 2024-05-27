<?php

class BookController 
{
    /**
     * Affiche la page d'accueil.
     * @return void
     */
    public function showHome() : void
    {
        $bookManager = new BookManager();
        $newBooks = $bookManager->getNewBooks();     

        $view = new View("Accueil");
        $view->render("home",['newBooks' => $newBooks]);
    }

    public function showBooks() : void
    {
        $bookManager = new BookManager();
        $books = $bookManager->getAllBooks();     

        $view = new View("Nos livres à l'échange");
        $view->render("books",['books' => $books]);
    }

    public function showBookDetail() : void
    {
        //$bookManager = new BookManager();
        //$books = $bookManager->getBookByID();     

        $view = new View("Titre du livre");
        $view->render("bookDetail");
    }
}