<?php
    include '../class/*';
    include '../connexion/*';

    class Artiste{
        private $id;
        private $nom;
        private $description;
        private $image;
        
        public function __construct($id,$nom,$description,$image) {
            this.$id = $id;
            this.$nom = $nom;
            this.$description = $description;
            this.$image = $image;
            
        }
    }

