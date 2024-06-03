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
}