<?php
    include '../connexion/connexion.php';
    include '*.php';
    class Magasin{
        private $user;
        private $stock;
        private $superAdmin;
        private $money;
        
        /*
         * Utilisation du singleton pour comprendre voir commande.php
         */
        
        private static $instance = null;
        private function __construct($superAdmin){
            this.$superAdmin = $superAdmin;
        }
?>
        