<?php

/**
 * Entité User : un user est défini par son id, un nom d'utilisateur, un mail et un password.
 */ 
class User extends AbstractEntity 
{
    protected int $id;
    private string $login;
    private string $email;
    private string $password;
    private ?string $picture;
    private DateTime $inscription;

    /**
     * Setter pour l'id.
     * @param int $id
     */
    public function setId(int $id) : void 
    {
        $this->id = $id;
    }

    /**
     * Getter pour l'id.
     * @return int
     */
    public function getId() : int 
    {
        return $this->id;
    }

    /**
     * Setter pour le login.
     * @param string $login
     */
    public function setLogin(string $login) : void 
    {
        $this->login = $login;
    }

    /**
     * Getter pour le login.
     * @return string
     */
    public function getLogin() : string 
    {
        return $this->login;
    }

    /**
     * Setter pour l'email.
     * @param string $mail
     */
    public function setEmail(string $email) : void 
    {
        $this->email = $email;
    }

    /**
     * Getter pour l'email.
     * @return string
     */
    public function getEmail() : string 
    {
        return $this->email;
    }

    /**
     * Setter pour le password.
     * @param string $password
     */
    public function setPassword(string $password) : void 
    {
        $this->password = $password;
    }

    /**
     * Getter pour le password.
     * @return string
     */
    public function getPassword() : string 
    {
        return $this->password;
    }

    /**
     * Setter pour l'image de profil.
     * @param string $picture
     */
    public function setPicture(?string $picture) : void 
    {
        if ($picture !== NULL) {
            $this->picture = $picture;
        }
        else {
            $this->picture = '';
        }
    }

    /**
     * Getter pour l'image de profil.
     * @return string
     */
    public function getPicture() : ?string 
    {
        return $this->picture;
    }

    /**
     * Setter pour la date d'inscription.
     * @param string $inscription
     */
    public function setInscription(string $inscription) : void 
    {
        $this->inscription = new DateTime($inscription);
    }

    /**
     * Getter pour la date d'inscription.
     * @return DateTime
     */
    public function getInscription() : DateTime 
    {
        return $this->inscription;
    }

}