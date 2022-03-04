<?php

class categorieModel
{
    private $db; // déclaration de la variable de connexion
    public $page;
    public $artist;

    /**
     * @brief  construction l'objet de la connexion avec l'ordre de se connecté à la bdd par la class Database
     */
    public function __construct()
    {
        $this->db = Database::connect();
    }

    public function setArtist(int $artist)
    {
        $this->artist = $artist;
    }

    public function setPage(int $page)
    {
        $this->page = $page;
    }

    public function getPage(): int
    {
        return (int)$this->page;
    }

    public function getArtist(): int
    {
        return (int)$this->artist;
    }

    /**
     * @brief charge la liste des disques avec une pagination
     * @return array
     */
    public function index(): array
    {
        $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $data = array();
        $diskParPage = 10; //Nous allons afficher 5 messages par page.
        $countdisk = $this->db->prepare('SELECT *   FROM  disc join artist a on disc.artist_id = a.artist_id where a.artist_id=?');
        $countdisk->execute(array($this->getArtist()));
        $total = $countdisk->rowCount();

        //Nous allons maintenant compter le nombre de pages.
        $data['countpage'] = ceil($total / $diskParPage);

        if (!empty($this->getPage()) && $this->getPage() != 0) // Si la variable $_GET['page'] existe...
        {
            $data['pageActuelle'] = intval($this->getPage());

            if ($data['pageActuelle'] > $data['countpage']) // Si la valeur de $data['pageActuelle'] (le numéro de la page) est plus grande que $nombreDePages...
            {
                $data['pageActuelle'] = $data['countpage'];
            }
        } else // Sinon
        {
            $data['pageActuelle'] = 1; // La page actuelle est la n°1
        }
        $debut = ($data['pageActuelle'] - 1) * $diskParPage;
        $listdisk = $this->db->prepare('SELECT * FROM disc join artist a on disc.artist_id = a.artist_id where a.artist_id=:artist ORDER BY disc.artist_id DESC LIMIT :debut, :nombre');
        $artistes = $this->getArtist();
        $listdisk->bindParam(':artist', $artistes);
        $listdisk->bindParam(':debut', $debut, PDO::PARAM_INT);
        $listdisk->bindParam(':nombre', $diskParPage, PDO::PARAM_INT);
        $listdisk->execute();
        $data['disk'] = $listdisk->fetchAll();
        return $data;
    }
}