<?php
<<<<<<< HEAD
    include_once '../connexion/connexion.php';
   /*********************************ADRESSE*********************************/
=======
    include '../class/*';
    include '../connexion/*';
>>>>>>> Création classes - Probleme connexion BDD - Méthode à vérifier

    class Adresse{
        private $numero;
        private $rue;
        private $code_postale;
        private $ville;
        private $region;
        private $pays;
        
        public function __construct($numero,$rue,$code_postale,$ville,$region,$pays){
<<<<<<< HEAD
            $this->$numero = $numero;
            $this->$rue = $rue;
            $this->$code_postale = $code_postale;
            $this->$ville = $ville;
            $this->$region = $region;
            $this->$pays = $pays;
        } 
        

        public function getNumero(){
            return $this->numero;
        }

        public function getRue(){
            return $this->rue;
        }

        public function getCode_Postale(){
            return $this->code_postale;
        }

        public function getVille(){
            return $this->ville;
        }

        public function getRegion(){
            return $this->region;
        }

        public function getPays(){
            return $this->pays;
        }




        public function setNumero($numero){
            $this->numero = $numero;
        }

        public function setRue($rue){
            $this->rue = $rue;
        }

        public function setCode_Postale($code){
            $this->code_postale = $code;
        }

        public function setVille($ville){
            $this->ville = $ville;
        }

        public function setRegion($region){
            $this->region = $region;
        }

        public function setPays($pays){
            $this->pays = $pays;
        }

        public function adresseString(){
            return $this->getNumero() . $this->getRue() . $this->getCode_Postale() . $this->getVille() . $this->getRegion() . $this->getPays();
        }
    }


    $adresse = new Adresse("8","rue d'atrac","77000","sansso","paris","France");
    /*$client = new Client("mdp","ngjom","prensom","lijhhgam",$adresse);
    $client->ajoutBdd();*/
    echo $adresse->getNumero();
?>
=======
            this.$numero = $numero;
            this.$rue = $rue;
            this.$code_postale = $code_postale;
            this.$ville = $ville;
            this.$region = $region;
            this.$pays = $pays;
        } 
        
    }

>>>>>>> Création classes - Probleme connexion BDD - Méthode à vérifier
