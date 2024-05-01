<?php

/**
 * Entité User : un user est défini par son id, un nom d'utilisateur, un mail et un password.
 */ 
class User extends AbstractEntity 
{
    private string $login;
    private string $mail;
    private string $password;

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
    public function setMail(string $mail) : void 
    {
        $this->mail = $mail;
    }

    /**
     * Getter pour l'email.
     * @return string
     */
    public function getMail() : string 
    {
        return $this->mail;
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
}