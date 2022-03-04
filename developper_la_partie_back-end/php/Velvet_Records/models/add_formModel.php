<?php

class add_formModel
{
    private $db; // déclaration de la variable de connexion


    /**
     * @brief  construction l'objet de la connexion avec l'ordre de se connecté à la bdd par la class Database
     */
    public function __construct()
    {
        $this->db = Database::connect();
    }

    /**
     * @brief retour la liste des artistes
     * @return array|false
     */
    public function index()
    {

        $listArtist = $this->db->prepare('select distinct artist_name from artist order by artist_name  ');
        $listArtist->execute();
        return $listArtist->fetchAll();
    }
}