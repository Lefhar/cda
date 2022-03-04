<?php
class Agence{ 
    private $_agence =NULL;
    private $_adresse =NULL;
    private $_codePostal;
    private $_nom = NULL;
    private $_ville = NULL;
    private $_resto = NULL;

    public function setAgence($agence){

        $this->_agence = $agence;
      }


        public function setNom($nom){

          $this->_nom = $nom;
        }

        public function setAdresse($adresse){

            $this->_adresse = $adresse;
          }

          public function setCodePostal($codePostal){

            $this->_codePostal = $codePostal;
          }

          public function setVille($ville){

            $this->_ville = $ville;
          }


public function setModeRestauration($restauration){

$this->_resto = $restauration;

}

public function getModeRestauration(){
    return $this->_resto;
}
          
          public function getAgence(){

            return $this->_agence;
           }

          public function getNom(){

           return $this->_nom;
          }
  
          public function getAdresse(){
  
            return  $this->_adresse ;
            }
  
            public function getCodePostal(){
  
                return  $this->_codePostal;
            }
  
            public function getVille(){
  
                return $this->_ville ;
            }
  
  
  
  



}
?>