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
        $sql = "SELECT Books.*, Users.username AS username
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
        $sql = "SELECT Books.*, Users.username AS username
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
        $sql = "SELECT Books.*, Users.username AS username
        FROM Books
        JOIN Users ON Books.user_id = Users.id
        WHERE Books.title LIKE '%$searchedBooks%'
        ORDER BY Books.id DESC";

        $result = $this->db->query($sql);
        $books = [];

        while ($book = $result->fetch()) {
            $books[] = new Book($book);
        }
        return $books;
    }
}