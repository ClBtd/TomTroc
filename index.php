<?php 

require_once 'config/config.php';
require_once 'config/autoload.php';

// On récupère l'action demandée par l'utilisateur.
// Si aucune action n'est demandée, on affiche la page d'accueil.
$action = Utils::request('action', 'home');

// Try catch global pour gérer les erreurs
try {

    $bookController = new BookController(new BookManager());
    $userController = new UserController(new UserManager());
    $messageController = new MessageController(new MessageManager());

    // Pour chaque action, on appelle le bon contrôleur et la bonne méthode.
    switch ($action) {

        // Pages accessibles à tous.

        case 'home':
            $bookController->showHome();
            break;
        
        case 'books' :
            $bookController->showBooks();
            break;
        
        case 'search' :
            $bookController->searchBooks();
            break;
        
        case 'bookDetail':
            $bookController->showBookDetail();
            break;
        
        case 'connectionForm' :
            $userController->displayConnectionForm();
            break;
        
        case 'inscriptionForm' :
            $userController->displayInscriptionForm();
            break;

        // Pages où une connexion est nécessaire.

        case 'messages' :
            $messageController->showMessages();
            break;  
            
        case 'account' :
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