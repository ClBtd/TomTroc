 <?php

 class Book extends AbstractEntity 
 {
    private int $id_user;
    private int $disponibility;
    private string $username;
    private string $title;
    private string $author;
    private string $cover;
    private string $description;
    private ?DateTime $dateCreation = null;

    /**
     * Setter pour l'id de l'utilisateur. 
     * @param int $id_user
     */
    public function setIdUser(int $id_user) : void 
    {
        $this->id_user = $id_user;
    }

    /**
     * Getter pour l'id de l'utilisateur.
     * @return int
     */
    public function getIdUser() : int 
    {
        return $this->id_user;
    }

    /**
     * Setter pour la disponibilité. 
     * @param int $disponibility
     */
    public function setDisponibility(int $disponibility) : void 
    {
        $this->disponibility = $disponibility;
    }

    /**
     * Getter pour la disponibilité.
     * @return int
     */
    public function getDisponibility() : int 
    {
        return $this->disponibility;
    }

    /**
     * Setter pour le nom de l'utilisateur. 
     * @param string $id_user
     */
    public function setUsername(string $username) : void 
    {
        $this->username = $username;
    }

    /**
     * Getter pour le nom l'utilisateur.
     * @return string
     */
    public function getUsername() : string 
    {
        return $this->username;
    }

    /**
     * Setter pour le titre.
     * @param string $title
     */
    public function setTitle(string $title) : void 
    {
        $this->title = $title;
    }

    /**
     * Getter pour le titre.
     * @return string
     */
    public function getTitle() : string 
    {
        return $this->title;
    }

    /**
     * Setter pour l'auteur.
     * @param string $author
     */
    public function setAuthor(string $author) : void 
    {
        $this->author = $author;
    }

     /**
     * Getter pour l'auteur.
     * @return string
     */
    public function getAuthor() : string 
    {
        return $this->author;
    }

    /**
     * Setter pour la couverture.
     * @param string $cover
     */
    public function setCover(string $cover) : void 
    {
        $this->cover = $cover;
    }

     /**
     * Getter pour la couverture.
     * @return string
     */
    public function getCover() : string 
    {
        return $this->cover;
    }

    /**
     * Setter pour la description.
     * @param string $description
     */
    public function setDescription(string $description) : void 
    {
        $this->description = $description;
    }

     /**
     * Getter pour la description.
     * @return string
     */
    public function getDescription() : string 
    {
        return $this->description;
    }

    /**
     * Setter pour la date de création. Si la date est une string, on la convertit en DateTime.
     * @param string|DateTime $dateCreation
     * @param string $format : le format pour la convertion de la date si elle est une string.
     * Par défaut, c'est le format de date mysql qui est utilisé. 
     */
    public function setDateCreation(string|DateTime $dateCreation, string $format = 'Y-m-d H:i:s') : void 
    {
        if (is_string($dateCreation)) {
            $dateCreation = DateTime::createFromFormat($format, $dateCreation);
        }
        $this->dateCreation = $dateCreation;
    }

    /**
     * Getter pour la date de création.
     * Grâce au setter, on a la garantie de récupérer un objet DateTime.
     * @return DateTime
     */
    public function getDateCreation() : DateTime 
    {
        return $this->dateCreation;
    }

 }