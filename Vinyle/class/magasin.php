<?php
    include '../connexion/connexion.php';
    include '*.php';
    class Magasin{
    	private $superAdmin;
        private $utilisateur;
        private $stock;
        private $money;
        
        /*
         * Utilisation du singleton pour comprendre voir commande.php
         */
        
        private static $instance = null;
        private function __construct($superAdmin){
            $this->superAdmin = $superAdmin;
            $this->utilisateur = array();
            $this->stock = array();
        }

        public function getSuperAdmin(){
        	return $this->superAdmin;
        }

        public function getUtilisateur(){
        	return $this->utilisateur;
        }

        public function getStock(){
        	return $this->stock;
        }

        public function getMoney(){
        	return $this->money;
        }

        public function ajoutClient($client){
        	$utilisateur[] = $client;
        	$client->ajoutBdd();
        }

        public function ajoutProduit($produit){
        	$stock[] = $produit;
        	
        	if($produit->type == "Vinyle")
        		$produit->ajoutBddVinyle();

        	if($produit->type == "Kit")
        		$produit->ajoutBddKit();

			if($produit->type == "Album")
        		$produit->ajoutBddAlbum();

        	if($produit->type == "Platine")
        		$produit->ajoutBddPlatine();
        }
?>
        