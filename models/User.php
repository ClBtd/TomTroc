<?php

/**
 * Entité User : un user est défini par son id, un nom d'utilisateur, un mail et un password.
 */ 
class User extends AbstractEntity 
{
    private string $login;
    private string $email;
    private string $password;
    private string $picture;
    private array $books;

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
    public function setPicture(string $picture) : void 
    {
        $this->picture = $picture;
    }

    /**
     * Getter pour l'image de profil.
     * @return string
     */
    public function getPicture() : string 
    {
        return $this->picture;
    }

    /**
     * Setter pour le tableau de livres.
     * @param array $books
     */
    public function setBooks(array $books) : void 
    {
        $this->books = $books;
    }

    /**
     * Getter pour le tableau de livres.
     * @return array
     */
    public function getBooks() : array 
    {
        return $this->books;
    }
}