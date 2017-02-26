<?php
    include '../class/*';
    include '../connexion/*';

    class Vinyle extends Produit{
        function __construct() {
            super($id,$nom,$image,$musique,$tag,$artiste,$commentaire);
            this.$type = "Vinyle";
        }
    }

