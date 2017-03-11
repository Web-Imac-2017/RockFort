<?php
    include_once '../connexion/connexion.php';

    include_once 'superAdmin.php';
    include_once 'vinyle.php';
    include_once 'kit.php';
    include_once 'platine.php';
    include_once 'album.php';


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

        public static function getInstance($superAdmin){
            if (self::$instance == null){
                self::$instance = new Magasin($superAdmin);
            }
            return self::$instance;
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

        	$client->ajoutBdd();
        }

        public function ajoutProduit($admin,$produit){
        	
        	if($produit->getType() == "Vinyle")
        		$produit->ajoutBddVinyle();

        	if($produit->getType() == "Kit")
        		$produit->ajoutBddKit();

			if($produit->getType() == "Album")
        		$produit->ajoutBddAlbum();

        	if($produit->getType() == "Platine")
        		$produit->ajoutBddPlatine();


        }

        public function allProduit(){
            global $bdd;
            $requete = $bdd->prepare("SELECT produit.* , artiste.nom FROM ( (produit INNER JOIN produit_artiste ON produit.id = produit_artiste.id_produit) INNER JOIN artiste ON produit_artiste.id_artiste = artiste.id)");
            $requete->execute( array( ) );
            $resultat = $requete->fetchAll();

        }

        public function platineProduit(){

            $platine = array();
            global $bdd;
            $requete = $bdd->prepare("SELECT DISTINCT (id) FROM produit WHERE type = 'Platine'");
            $requete->execute( array( ) );
            $resultat = $requete->fetchAll();
            
        }

        public function vinyleProduit(){
            global $bdd;
            $requete = $bdd->prepare("SELECT DISTINCT (id) FROM produit WHERE type = 'Vinyle'");
            $requete->execute( array( ) );
            $resultat = $requete->fetchAll();
        }

        public function kitProduit(){
            global $bdd;
            $requete = $bdd->prepare("SELECT DISTINCT (id) FROM produit WHERE type = 'Kit'");
            $requete->execute( array( ) );
            $resultat = $requete->fetchAll();

        }

        public function albumProduit(){
            global $bdd;
            $requete = $bdd->prepare("SELECT DISTINCT (id) FROM produit WHERE type = 'Album'");
            $requete->execute( array( ) );
            $resultat = $requete->fetchAll();

        }

        public function searchProduit($id){
            global $bdd;
            $requete = $bdd->prepare("SELECT * FROM produit WHERE id = ?");
            $requete->execute( array( $id) );
            $resultat = $requete->fetch();
        }

        public function allArticle(){
            global $bdd;
            $requete = $bdd->prepare("SELECT * FROM article");
            $requete->execute( array( ) );
            $resultat = $requete->fetchAll();
            print_r($resultat);
        }

        public function searchArticle($id){
            global $bdd;
            $requete = $bdd->prepare("SELECT * FROM article WHERE id = ?");
            $requete->execute( array( $id) );
            $resultat = $requete->fetch();
        }

    }

    $superAdmin = new superAdmin("Miles","Miles","Morales","Miles","mail");
    
    $admin = new Admin("Walter","Peter","Parker","Peter","mail");

    $magasin = Magasin::getInstance($superAdmin);


    $nom = "Tabloid Junkie";
    $image = "imagehei";
    $musique = "Le meilleur son de l'album HISTORY";
    $prix = 299;
    $tag = array('a' => "KingOfPop", 'b' => "HISTORY", 'c' => "JFK", 'd' => "MarilynMonroe");
    $mj = new Artiste("Michael Jackson", "Artiste de varieté le plus courroner de tous les temps", "image");
    $biggie = new Artiste("Notorious BIG", "la star du label Bad Boy", "image");
    $artiste = array('a' => $mj);
    $description = "Chanson 100% réalisé par MJ dans l'album HISTORY";

    $vinyle = new Vinyle($nom,$image,$musique,$prix,$tag,$artiste,$description);

    $magasin->searchArticle(2);
    //$magasin->allProduit();


   




?>
        