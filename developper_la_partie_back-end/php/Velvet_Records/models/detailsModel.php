<?php

class detailsModel
{
    private $db; // déclaration de la variable de connexion
    public $id;

    /**
     * @brief  construction l'objet de la connexion avec l'ordre de se connecté à la bdd par la class Database
     */
    public function __construct()
    {
        $this->db = Database::connect();
    }

    /**
     * @param int $id
     */
    public function setId(int $id)
    {
        $this->id = $id;
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @brief recupération des details du disque
     * @return array
     */
    public function index(): array
    {
        $details = $this->db->prepare('SELECT * FROM disc join artist a on disc.artist_id = a.artist_id  where disc_id=?');
        $details->execute(array($this->getId()));
        $data['details'] = $details->fetch();
        return $data;
    }
}