<?php

/**
 * Classe qui gère les livres.
 */
class BookManager extends AbstractEntityManager
{
    /**
     * Récupère les 4 derniers livres ajoutés.
     * @return array : un tableau d'objets Book.
     */
    public function getNewBooks() : array
    {
        $sql = "SELECT Books.*, Users.login AS login
        FROM Books
        JOIN Users ON Books.user_id = Users.id
        WHERE Books.disponibility = 1
        ORDER BY Books.id DESC
        LIMIT 4";

        $result = $this->db->query($sql);
        $books = [];

        while ($book = $result->fetch()) {
            $books[] = new Book($book);
        }
        return $books;
    }

    /**
     * Récupère tous les livres.
     * @return array : un tableau d'objets Book.
     */
    public function getAllBooks() : array
    {
        $sql = "SELECT Books.*, Users.login AS login
        FROM Books
        JOIN Users ON Books.user_id = Users.id
        ORDER BY Books.id DESC";

        $result = $this->db->query($sql);
        $books = [];

        while ($book = $result->fetch()) {
            $books[] = new Book($book);
        }
        return $books;
    }

    /**
     * Récupère le ou les livres recherchés.
     * @return array : un tableau d'objets Book.
     */
    public function getSearchedBooks(string $searchedBooks) : array
    {
        $sql = "SELECT Books.*, Users.login AS login
        FROM Books
        JOIN Users ON Books.user_id = Users.id
        WHERE Books.title LIKE :search
        ORDER BY Books.id DESC";

        $result = $this->db->query($sql, ['search' => "%$searchedBooks%"]);
        $books = [];

        while ($book = $result->fetch()) {
            $books[] = new Book($book);
        }
        return $books;
    }

    /**
     * Récupère les informations du livre via son ID.
     * @return Book : un objets Book.
     */
    public function getBookById(int $bookId) : ?Book
    {
        $sql = "SELECT Books.*, Users.login AS login, Users.picture AS user_picture
        FROM Books
        JOIN Users ON Books.user_id = Users.id
        WHERE Books.id = $bookId";
        $result = $this->db->query($sql);
        $book = $result->fetch();

        if ($book) {
            return new Book($book);
        }
        return null;
    }

    /**
     * Récupère le ou les livres d'un utilisateur.
     * @return array : un tableau d'objets Book.
     */
    public function getBooksByUser(string $email) : array
    {
        $sql = "SELECT Books.*, Users.email AS email
        FROM Books
        JOIN Users ON Books.user_id = Users.id
        WHERE Users.email = :email
        ORDER BY Books.id DESC";

        $result = $this->db->query($sql, ['email' => $email]);
        $books = [];

        while ($book = $result->fetch()) {
            $books[] = new Book($book);
        }
        return $books;
    }

    /**
     * Modifier les données d'un livre.
     * @param Book $book
     * @return bool $result
     */
    public function updateBook(Book $book) : bool
    {
        $sql = "UPDATE Books SET title=:title, author=:author, description=:description, disponibility=:disponibility WHERE Books.id=:id";
        $params =[
                ':title' => $book->getTitle(),
                ':author' => $book->getAuthor(),
                ':description' => $book->getDescription(),
                ':disponibility' => $book->getDisponibility(),
                ':id' => $book->getId()
            ];  

        $result = $this->db->query($sql, $params);
        return $result->rowCount() > 0;

    }

    /**
     * Supprime un livre.
     * @return bool $result
     */
    public function deleteBook(int $id, string $cover) : bool
    {
        if (file_exists("img/covers/$cover")) {
            unlink("img/covers/$cover");
        }

        $sql = "DELETE FROM Books WHERE id = :id";
        $result = $this->db->query($sql, ['id' => $id]);
        return $result->rowCount() > 0;

    }

    /**
     * Ajouter un nouveau livre.
     * @param Book $book
     * @return bool
     */
    public function addBook(Book $book) : bool 
    {
        $sql = "INSERT INTO Books (title, author, description, disponibility, user_id) VALUES (:title, :author, :description, :disponibility, :user_id)";
        $params =[
            ':title' => $book->getTitle(),
            ':author' => $book->getAuthor(),
            ':description' => $book->getDescription(),
            ':disponibility' => $book->getDisponibility(),
            ':user_id' => $book->getUserId()
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
     * Charger la couverture d'un livre.
     * @param string $coverPath $filename
     * @return bool $result
     */
    public function uploadCover(string $coverPath, string $fileName, string $ext, int $bookId, bool $existing) : bool 
    {
        $filePath = "img/covers/$fileName";
        $fileExtensions = ['.jpg', '.png'];

        foreach ($fileExtensions as $fileExtension) {
            if (file_exists($filePath.$fileExtension)) {
                unlink($filePath.$fileExtension);
            }
        }

        move_uploaded_file($coverPath, $filePath . $ext);

        if (!$existing) {
            $sql = "UPDATE Books SET cover=:cover WHERE Books.id=:id";
            $params =[
                ':cover' => $fileName . $ext,
                ':id' => $bookId
            ];
            $result = $this->db->query($sql, $params);
            return $result->rowCount() > 0;
        }
       
        else {
            return $result = true; 
        }
    }

}