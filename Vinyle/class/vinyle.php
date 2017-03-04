<?php
    include '../connexion/connexion.php';
    class Vinyle extends Produit{
        function __construct() {
            super($id,$nom,$image,$musique,$tag,$artiste,$commentaire);
            this.$type = "Vinyle";
        }
    }
?>