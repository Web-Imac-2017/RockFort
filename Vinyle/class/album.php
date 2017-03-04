<?php
    include '../connexion/connexion.php';
    include '../connexion/artiste.php';

    class Album extends Produit{
        function __construct() {
            super($id,$nom,$image,$musique,$tag,$artiste,$commentaire);
            this.$type = "Album";
        }
    }
?>