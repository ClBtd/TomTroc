<?php

/**
 * Entité Message : un message est défini par son id, son contenu, sa date d'envoi, son émetteur et son récepteur.
 */ 
class Message extends AbstractEntity 
{
    private string $content;
    private DateTime $date;
    private int $userId;
    private int $senderId;
    private ?string $senderLogin = null;
    private ?string $senderPicture = null;
    private ?string $userLogin = null;
    private ?string $userPicture = null; 

    /**
     * Setter pour le contenu.
     * @param string $content
     */
    public function setContent(string $content) : void 
    {
        $this->content = $content;
    }

    /**
     * Getter pour le contenu.
     * @return string
     */
    public function getContent() : string 
    {
        return $this->content;
    }

    /**
     * Setter pour la date.
     * @param string $date
     */
    public function setDate(string $date) : void 
    {
        $this->date = new DateTime($date);
    }

    /**
     * Getter pour la date.
     * @return string
     */
    public function getDate() : DateTime 
    {
        return $this->date;
    }

    /**
     * Setter pour l'id de l'envoyeur.
     * @param int $senderId
    */
    public function setSenderId(int $senderId) : void 
    {
        $this->senderId = $senderId;
    }
    

    /**
     * Getter pour l'id de l'envoyeur.
     * @return int
    */
    public function getSenderId() : int 
    {
        return $this->senderId;
    }

    /**
     * Setter pour l'id de l'utilisateur.
     * @param int $userId
    */
    public function setUserId(int $userId) : void 
    {
        $this->userId = $userId;
    }
    

    /**
     * Getter pour l'id de l'utilisateur.
     * @return int
    */
    public function getUserId() : int 
    {
        return $this->userId;
    }

    /**
     * Setter pour le login du correspondant.
     * @param string $senderLogin
    */
    public function setSenderLogin(string $senderLogin) : void 
    {
        if ($senderLogin) {
            $this->senderLogin = $senderLogin;
        }
    }
    
    /**
     * Getter pour le login du correspondant.
     * @return string
    */
    public function getSenderLogin() : string 
    {
        return $this->senderLogin;
    }

    /**
     * Setter pour l'image du correspondant.
     * @param string $senderPicture
    */
    public function setSenderPicture(string $senderPicture) : void 
    {
        if ($senderPicture) {
            $this->senderPicture = $senderPicture;
        }
    }
    
    /**
     * Getter pour l'image du correspondant.
     * @return string
    */
    public function getSenderPicture() : string 
    {
        return $this->senderPicture;
    }

    /**
     * Setter pour le login de l'utilisateur.
     * @param string $userLogin
    */
    public function setUserLogin(string $userLogin) : void 
    {
        if ($userLogin) {
            $this->userLogin = $userLogin;
        }
    }
    
    /**
     * Getter pour le login de l'utilisateur.
     * @return string
    */
    public function getUserLogin() : string 
    {
        return $this->userLogin;
    }

    /**
     * Setter pour l'image de l'utilisateur.
     * @param string $userPicture
    */
    public function setUserPicture(string $userPicture) : void 
    {
        if ($userPicture) {
            $this->userPicture = $userPicture;
        }
    }
    
    /**
     * Getter pour l'image de l'utilisateur.
     * @return string
    */
    public function getUserPicture() : string 
    {
        return $this->userPicture;
    }
}