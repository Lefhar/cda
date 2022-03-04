<?php

class headerModel
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
     * @brief fonction permettant de retourner une boucles des artistes pour le menu navbar
     * @return array
     */
    public function catHead():array
    {

        $listArtist = $this->db->prepare('select distinct artist_name,artist_id from artist order by artist_name');
        $listArtist->execute();
        return $listArtist->fetchAll();
    }
}