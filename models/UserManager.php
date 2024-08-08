<?php

/** 
 * Manager des méthodes relatives aux utilisateurs.
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
     * Récupère un user par son Id.
     * @param string $login
     * @return ?User
     */
    public function getUserById(string $id) : ?User 
    {
        $sql = "SELECT * FROM Users WHERE id = :id";
        $result = $this->db->query($sql, ['id' => $id]);
        $user = $result->fetch();
        if ($user) {
            return new User($user);
        }
        return null;
    }

    /**
     * Ajoute un nouvel utilisateur.
     * @param User $user
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
     * Charge l'image de profil, supprime l'ancienne et modifie la base de donnée si besoin.
     * @param string $picture_path $filename
     * @return bool $result
     */
    public function uploadPicture(string $picturePath, string $fileName, string $ext, int $userId, bool $existing) : bool 
    {
        $filePath = "img/users/$fileName";
        $fileExtensions = ['.jpg', '.png'];

        foreach ($fileExtensions as $fileExtension) {
            if (file_exists($filePath.$fileExtension)) {
                unlink($filePath.$fileExtension);
            }
        }

        move_uploaded_file($picturePath, $filePath . $ext);

        if (!$existing) {
            $sql = "UPDATE Users SET picture=:picture WHERE Users.id=:id";
            $params =[
                ':picture' => $fileName . $ext,
                ':id' => $userId
            ];
            $result = $this->db->query($sql, $params);
            return $result->rowCount() > 0;
        }
       
        else {
            return $result = true; 
        }
    }
    
    /**
     * Modifie les données d'un utilisateur.
     * @param string $login $email $id
     * @return bool
     */
    public function updateUser(User $user) : bool
    {
        
        if (empty($user->getPassword())) {
            $sql = "UPDATE Users SET login=:login, email=:email WHERE Users.id=:id";
            $params =[
                ':login' => $user->getLogin(),
                ':email' => $user->getEmail(),
                ':id' => $user->getId()
            ];
        }

        else {
            $sql = "UPDATE Users SET login=:login, email=:email, password=:password WHERE Users.id=:id";
            $params =[
                ':login' => $user->getLogin(),
                ':email' => $user->getEmail(),
                ':password' => $user->getPassword(),
                ':id' => $user->getId()
            ];  
        }
        
        $result = $this->db->query($sql, $params);
        return $result->rowCount() > 0;

    }
}