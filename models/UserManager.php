<?php

/** 
 * Classe UserManager pour gérer les requêtes liées aux users et à l'authentification.
 */

class UserManager extends AbstractEntityManager 
{
    /**
     * Récupère un user par son mail.
     * @param string $email
     * @return ?User
     */
    public function getUserByEmail(string $email) : ?User 
    {
        $sql = "SELECT * FROM Users WHERE email = :email";
        $result = $this->db->query($sql, ['email' => $email]);
        $user = $result->fetch();
        if ($user) {
            return new User($user);
        }
        return null;
    }

    /**
     * Récupère un user par son login.
     * @param string $login
     * @return ?User
     */
    public function getUserByLogin(string $login) : ?User 
    {
        $sql = "SELECT * FROM Users WHERE username = :login";
        $result = $this->db->query($sql, ['login' => $login]);
        $user = $result->fetch();
        if ($user) {
            return new User($user);
        }
        return null;
    }

    /**
     * Ajouter un nouvel utilisateur.
     * @param string $login $email $password
     * @return bool
     */
    public function createUser(User $user) : bool 
    {
        $sql = "INSERT INTO Users (username, email, password) VALUES (:login, :email, :password)";
        $params =[
            ':login' => $user->getLogin(),
            ':email' => $user->getEmail(),
            ':password' => $user->getPassword()
        ];

        $result = $this->db->query($sql, $params);
        return $result->rowCount() > 0;
    }

    /**
     * Récupérer les infos d'un utilisateur.
     * @param string $email $password
     * @return User
     */
    public function getUserInfos(string $email) : ?User 
    {
        $sql = "SELECT * FROM Users WHERE email = :email";
        $result = $this->db->query($sql, ['email' => $email]);
        $user = $result->fetch();
        if ($user) {
            return $userInfos = new User($user);
        }
        return null;
    }
}