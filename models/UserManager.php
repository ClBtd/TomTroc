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
        $sql = "SELECT * FROM Users WHERE login = :login";
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
        $sql = "INSERT INTO Users (login, email, password, inscription) VALUES (:login, :email, :password, :inscription)";
        $params =[
            ':login' => $user->getLogin(),
            ':email' => $user->getEmail(),
            ':password' => $user->getPassword(),
            ':inscription' => date('Y-m-d')
        ];

        $result = $this->db->query($sql, $params);
        return $result->rowCount() > 0;
    }

    /**
     * Récupérer les infos d'un utilisateur.
     * @param string $email
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

    /**
     * Modifier les données d'un utilisateur.
     * @param string $login $email $id
     * @return void
     */
    public function updateUser(User $user) : void
    {
        $sql = "UPDATE Users SET login=:login, email=:email WHERE Users.id=:id";
        $params =[
            ':login' => $user->getLogin(),
            ':email' => $user->getEmail(),
            ':id' => $user->getId(),
        ];

        $result = $this->db->query($sql, $params);
    }
}