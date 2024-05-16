<?php

/**
 * Classe qui gère les livres.
 */
class BookManager extends AbstractEntityManager
{
    /**
     * Récupère tous les articles.
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
}