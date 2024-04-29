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
        $sql = "SELECT * FROM Books WHERE disponibility = 1 LIMIT 4";
        $result = $this->db->query($sql);
        $books = [];

        while ($book = $result->fetch()) {
            $books[] = new Book($book);
        }
        return $books;
    }
}