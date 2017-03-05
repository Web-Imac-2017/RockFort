<?php
    include '../connexion/connexion.php';
    include 'artiste.php';
    include 'produit.php';
    
    class Platine extends Produit{
        function __construct() {
            super($id,$nom,$image,$musique,$tag,$artiste,$commentaire);
            this.$type = "Platine";
        }
    }
?>