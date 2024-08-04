<?php

/**
 * Contrôleur de la partie messages.
 */
 
class MessageController {

    private $messageManager;

    /**
     * Définition du constructeur
     * @return MessageManager
     */
    public function __construct(MessageManager $messageManager)
    {
        $this->messageManager = $messageManager;
    }

    /**
     * Affiche la page d'administration.
     * @return void
     */
    public function showMessages() : void
    {
        // On vérifie que l'utilisateur est connecté et on récupère son Id.
        Utils::checkIfUserIsConnected();
        $user = new UserManager;
        $userInfos = $user->getUserByEmail($_SESSION['userEmail']);
        $userId = $userInfos->getId();

        $conversations = $this->messageManager->getAllConversations($userId);

        //On récupère l'id du correspondant choisi ou du plus récent et ses informations ainsi que les messages reçus et envoyés à  cet utilisateur..
        if (isset($_GET['userId'])) {
            $senderId = (int)htmlspecialchars($_GET['userId']);
            if ($senderId === $userId) {
                throw new Exception("Vous ne pouvez pas vous envoyer de message.");
            }
            $senderInfos = $user->getUserById($senderId);
            $infos = [
                'senderLogin'=>$senderInfos->getLogin(),
                'senderPicture'=>$senderInfos->getPicture()
            ];
            $infos['userId'] = $userId;
            $infos['senderId']= $senderId;
            $messages = $this->messageManager->getMessagesRecieved($userId, $senderId);
        }
        elseif (!empty($conversations)) {
            if ($conversations[0]->getSenderId() !== $userId) {
                $senderId = $conversations[0]->getSenderId();
                $infos = [
                    'senderLogin'=>$conversations[0]->getSenderLogin(),
                    'senderPicture'=>$conversations[0]->getSenderPicture()
                ];
            }
            else {
                $senderId = $conversations[0]->getUserId();
                $infos = [
                    'senderLogin'=>$conversations[0]->getUserLogin(),
                    'senderPicture'=>$conversations[0]->getUserPicture()
                ];
            }
            $infos['userId'] = $userId;
            $infos['senderId']= $senderId;
            $messages = $this->messageManager->getMessagesRecieved($userId, $senderId);
        }
        else {
            $infos = null;
            $messages = null;
        }
        
        // On affiche la page de conversation.
        $view = new View("Messagerie");
        $view->render("messages", ['conversations'=>$conversations, 'messages'=>$messages, 'infos'=>$infos]);
    }

    public function sendMessage() : void {

        // On récupère les données du formulaire.
        $userId = Utils::request("userId");
        $senderId = Utils::request("senderId");
        $content = htmlspecialchars(Utils::request("message"));

        // On vérifie que les données sont valides.
        if (empty($content)) {
            throw new Exception("Votre message est vide.");
        }

        //On crée un objet message.
        $message = new Message([
            'userId' => $userId,
            'senderId' => $senderId,
            'content' => $content,
        ]);

        //On ajoute le nouveau livre.
        $result = $this->messageManager->sendMessage($message);

        // On vérifie que l'ajout a bien fonctionné.
        if (!$result) {
            throw new Exception("Une erreur est survenue lors de l'envoi du message.");
        }

        // On redirige vers la page de connexion.
        Utils::redirect("messages", ["senderId"=>$userId]);
    } 

}
