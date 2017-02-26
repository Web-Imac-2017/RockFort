<?php
    include '../class/*';
    include '../connexion/*';

    class Album extends Produit{
        function __construct() {
            super($id,$nom,$image,$musique,$tag,$artiste,$commentaire);
            this.$type = "Album";
        }
    }

