<?php
    include '../class/*';
    include '../connexion/*';
    
    class Platine extends Produit{
        function __construct() {
            super($id,$nom,$image,$musique,$tag,$artiste,$commentaire);
            this.$type = "Platine";
        }
    }

