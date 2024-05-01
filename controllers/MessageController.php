<?php

/**
 * Contrôleur de la partie messages.
 */
 
class MessageController {

    /**
     * Affiche la page d'administration.
     * @return void
     */
    public function showMessages() : void
    {
        // On vérifie que l'utilisateur est connecté.
        Utils::checkIfUserIsConnected();

        // On récupère les articles.
        //$messageManager = new MessageManager();
        //$messages = $messageManager->getAllMessages();

        // On affiche la page d'administration.
        $view = new View("Messagerie");
        $view->render("messages");
    }

}