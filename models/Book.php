 <?php

 class Book extends AbstractEntity 
 {
    protected int $id;
    private int $id_user;
    private int $disponibility;
    private string $login;
    private string $title;
    private string $author;
    private ?string $cover;
    private string $description;
    private string $user_picture;


    /**
     * Setter pour l'id du livre. 
     * @param int $id
     */
    public function setId(int $id) : void 
    {
        $this->id = $id;
    }

    /**
     * Getter pour l'id du livre.
     * @return int
     */
    public function getId() : int 
    {
        return $this->id;
    }

    /**
     * Setter pour l'id de l'utilisateur. 
     * @param int $id_user
     */
    public function setUserId(int $id_user) : void 
    {
        $this->id_user = $id_user;
    }

    /**
     * Getter pour l'id de l'utilisateur.
     * @return int
     */
    public function getUserId() : int 
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
     * @param string $login
     */
    public function setLogin(string $login) : void 
    {
        $this->login = $login;
    }

    /**
     * Getter pour le nom l'utilisateur.
     * @return string
     */
    public function getLogin() : string 
    {
        return $this->login;
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
    public function setCover(?string $cover) : void 
    {
        if ($cover !== NULL) {
            $this->cover = $cover;
        }
        else {
            $this->cover = '';
        }
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
     * Setter pour l'image de l'utilisateur.
     * @param string $user_picture
     */
    public function setUserPicture(string $user_picture) : void 
    {
        $this->user_picture = $user_picture;
    }

     /**
     * Getter pour l'image de l'utilisateur.
     * @return string
     */
    public function getUserPicture() : string 
    {
        return $this->user_picture;
    }

 }