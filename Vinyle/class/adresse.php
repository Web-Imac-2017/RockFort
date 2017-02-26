<?php
    include '../class/*';
    include '../connexion/*';

    class Adresse{
        private $numero;
        private $rue;
        private $code_postale;
        private $ville;
        private $region;
        private $pays;
        
        public function __construct($numero,$rue,$code_postale,$ville,$region,$pays){
            this.$numero = $numero;
            this.$rue = $rue;
            this.$code_postale = $code_postale;
            this.$ville = $ville;
            this.$region = $region;
            this.$pays = $pays;
        } 
        
    }

