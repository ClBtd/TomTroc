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
        $books = $bookManager->getNewBooks();     

        $view = new View("Accueil");
        $view->render("home",['books' => $books]);
    }
}