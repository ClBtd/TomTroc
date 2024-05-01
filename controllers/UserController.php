<?php

class UserController {

    /**
     * Affiche la page d'administration.
     * @return void
     */
    public function showAccount() : void
    {
        // On vérifie que l'utilisateur est connecté.
        //Utils::checkIfUserIsConnected();

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
}