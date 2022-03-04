<?php
    class Directeur 
    {

    private $_nom;
    private $_prenom;
    private $_dateEmbauche;
    private $_fonction;
    private $_salaire;
    private $_service;
    private $_anciennete;
    private $_agence =NULL;
    public static $nbrEmploye = 0;


    public   function __construct() 
    {
        
    
        self::$nbrEmploye++ ;
    }


    public function getNom()
    { 
       
        return $this->_nom;
    }

    public function getPrenom()
    {
        return $this->_prenom;
    }

    public function getDateEmbauche()
    {
        return $this->_dateEmbauche ;
  
    }

    public function getFonction()
    {
        return $this->_fonction;
  
    }

    public function getSalaire()
    {
        return $this->_salaire;
    }

    public function getService()
    {
        return $this->_service;
    }
    
    public function getAnciennete()
    {
         
        $this->_anciennete = date_diff($this->getDateEmbauche(),new DateTime());
        return $this->_anciennete->y ;

         
    }
        public function isChequeVacance()
        {
            if($this->getAnciennete()>= 1)
            {
                return true;
            }else{
                return false;
            }
        }

    public function calculerPrime()
    {
        $prime = (($this->_salaire*0.07)+(($this->_salaire*$this->getAnciennete())*0.03));
        return (int)$prime;

    }
    
    public function setNom($nom)
    {
      
        $this->_nom = $nom;
    }


    public function setPrenom($prenom)
    {
    
        $this->_prenom = $prenom;
    }

    public function setDateEmbauche($dateembauche)
    {

        $this->_dateEmbauche = DateTime::createFromFormat('d/m/Y', $dateembauche);
    }

    public function setFonction($fonction){
        $this->_fonction = $fonction;
    }

    public function setSalaire($salaire)
    {
        $this->_salaire = $salaire;
    }

    public function setService($service)
    {
        $this->_service = $service;
    }






}