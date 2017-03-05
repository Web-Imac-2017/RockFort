<?php
    include '../connexion/connexion.php';
   /*********************************ADRESSE*********************************/

    class Adresse{
        private $numero;
        private $rue;
        private $code_postale;
        private $ville;
        private $region;
        private $pays;
        
        public function __construct($numero,$rue,$code_postale,$ville,$region,$pays){
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
    }
?>