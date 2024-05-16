<?php 

require_once 'config/config.php';
require_once 'config/autoload.php';

// On récupère l'action demandée par l'utilisateur.
// Si aucune action n'est demandée, on affiche la page d'accueil.
$action = Utils::request('action', 'home');

// Try catch global pour gérer les erreurs
try {
    // Pour chaque action, on appelle le bon contrôleur et la bonne méthode.
    switch ($action) {

        // Pages accessibles à tous.

        case 'home':
            $bookController = new BookController();
            $bookController->showHome();
            break;
        
        case 'books' :
            $bookController = new BookController();
            $bookController->showBooks();
            break;
        
        case 'bookDetail':
            $bookController = new BookController();
            $bookController->showBookDetail();
            break;
        
        case 'connectionForm' :
            $userController = new UserController();
            $userController->displayConnectionForm();
            break; 

        // Pages où une connexion est nécessaire.

        case 'messages' :
            $messageController = new MessageController();
            $messageController->showMessages();
            break;  
            
        case 'account' :
            $userController = new UserController();
            $userController->showAccount();
            break;
        

        default:
            throw new Exception("La page demandée n'existe pas.");
    }
} catch (Exception $e) {
    // En cas d'erreur, on affiche la page d'erreur.
    $errorView = new View('Erreur');
    $errorView->render('error', ['errorMessage' => $e->getMessage()]);
}