<?php

class Personnage
{
    private $Nom;
    private $Prenom;
    private $Age;
    private $Sexe;


    /**
     * @param $nom
     * @return void
     */
    public function setNom($nom)
    {
        $this->Nom = $nom;
    }

    /**
     * @param $prenom
     * @return void
     */
    public function setPrenom($prenom)
    {
        $this->Prenom = $prenom;
    }

    /**
     * @param $age
     * @return void
     */
    public function setAge($age)
    {
        $this->Age = $age;
    }

    /**
     * @param $sexe
     * @return void
     */
    public function setSexe($sexe)
    {
        $this->Sexe = $sexe;
    }

    /**
     * @return mixed
     */
    public function getNom()
    {
        return $this->Nom;
    }

    /**
     * @return mixed
     */
    public function getPrenom()
    {
        return $this->Prenom;
    }

    /**
     * @return mixed
     */
    public function getAge()
    {
        return $this->Age;
    }

    /**
     * @return mixed
     */
    public function getSexe()
    {
        return $this->Sexe;
    }


}