<?php
    include '../class/*';
    include '../connexion/*';

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
        
        public static function getInstance(){
            if(self::$instance == NULL){
                self::$instance = new Magasin($superAdmin);
            }
            return self::$instance;
        }
        
    }

