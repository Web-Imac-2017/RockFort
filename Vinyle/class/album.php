<?php
    include '../connexion/connexion.php';
    include 'artiste.php';
    include 'produit.php';

    class Album extends Produit{
        function __construct() {
            super($id,$nom,$image,$musique,$tag,$artiste,$commentaire);
            this.$type = "Album";
        }
    }
?>