<?php
    include '../connexion/connexion.php';

    include_once 'superAdmin.php';

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
        	$utilisateur[] = $client;
        	$client->ajoutBdd();
        }

        public function ajoutProduit($admin,$produit){
        	$stock[] = $produit;
        	
        	if($produit->getType() == "Vinyle")
        		$produit->ajoutBddVinyle();

        	if($produit->getType() == "Kit")
        		$produit->ajoutBddKit();

			if($produit->getType() == "Album")
        		$produit->ajoutBddAlbum();

        	if($produit->getType() == "Platine")
        		$produit->ajoutBddPlatine();
        }


         public function modif_descrition_produit($description, $produit_nom){
            global $bdd;
            $requete = $bdd->prepare("UPDATE produit SET description = ?  WHERE nom = ?");
            $requete->execute( array( $description, $produit_nom ) );

        }


        public function modif_image_produit($image, $produit_nom){
            global $bdd;
            $requete = $bdd->prepare("UPDATE produit SET image = ?  WHERE nom = ?");
            $requete->execute( array( $image, $produit_nom ) );

        }

        public function modif_prix_produit($prix, $produit_nom){
            global $bdd;
            $requete = $bdd->prepare("UPDATE produit SET prix = ?  WHERE nom = ?");
            $requete->execute( array( $prix, $produit_nom ) );

        }

        public function suppression_produit_id($id_produit){
            global $bdd;
            $requete = $bdd->prepare(" DELETE FROM produit WHERE id = ?");
            $requete->execute( array( $id_produit ) );

            $requete = $bdd->prepare(" DELETE FROM produit_artiste WHERE id_produit = ?");
            $requete->execute( array( $id_produit ) );

            $requete = $bdd->prepare(" DELETE FROM produit_tag WHERE id_produit = ?");
            $requete->execute( array( $id_produit ) );
        }

       public function suppression_produit_nom($nom_produit){
            global $bdd;

            $requete = $bdd->prepare(" SELECT Distinct (id) FROM produit WHERE  nom = ?"); 
            $requete->execute( array( $nom_produit ) );
            $id = $requete->fetchAll();

            foreach ($id as $key => $value) {
                foreach ($value as $val) {
                    $requete = $bdd->prepare(" DELETE FROM produit_artiste WHERE id_produit = ?");
                    $requete->execute( array( $val ) );


                    $requete = $bdd->prepare(" DELETE FROM produit_tag WHERE id_produit = ?");
                    $requete->execute( array( $val ) );
                }
                
            }

            $requete = $bdd->prepare(" DELETE FROM produit WHERE nom = ?");
            $requete->execute( array( $nom_produit ) );

        }


        public function suppression_produit_type_nom($type_produit, $nom_produit){
            global $bdd;

            $requete = $bdd->prepare(" SELECT Distinct (id) FROM produit WHERE  type = ? AND nom = ?"); 
            $requete->execute( array( $type_produit, $nom_produit ) );
            $id = $requete->fetchAll();

            foreach ($id as $key => $value) {
                foreach ($value as $val) {
                    $requete = $bdd->prepare(" DELETE FROM produit_artiste WHERE id_produit = ?");
                    $requete->execute( array( $val ) );


                    $requete = $bdd->prepare(" DELETE FROM produit_tag WHERE id_produit = ?");
                    $requete->execute( array( $val ) );
                }
                
            }

            $requete = $bdd->prepare(" DELETE FROM produit WHERE type = ? AND nom = ?");
            $requete->execute( array( $type_produit, $nom_produit ) );

        }

        public function suppression_article_id($id_article){
            global $bdd;
            $requete = $bdd->prepare(" DELETE FROM article WHERE id = ?");
            $requete->execute( array( $id_article ) );

            $requete = $bdd->prepare(" DELETE FROM article_tag WHERE id_article = ?");
            $requete->execute( array( $id_article ) );

        }

        public function suppression_article_nom($nom_article){
            global $bdd;

            $requete = $bdd->prepare(" SELECT Distinct (id) FROM article WHERE  nom = ?"); 
            $requete->execute( array( $nom_article ) );
            $id = $requete->fetchAll();

            foreach ($id as $key => $value) {
                foreach ($value as $val) {
                    $requete = $bdd->prepare(" DELETE FROM article_tag WHERE id_article = ?");
                    $requete->execute( array( $val ) );

                }
            }
            $requete = $bdd->prepare(" DELETE FROM article WHERE nom = ?");
            $requete->execute( array( $nom_article ) );
        }


        public function achat($client, $produit)

    }

    $superAdmin = new superAdmin("Miles","Miles","Morales","Miles","mail");
    $magasin = Magasin::getInstance($superAdmin);
    $admin = new Admin("Peter","Peter","Parker","Peter","mail");


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

    $magasin->ajoutProduit($admin,$vinyle);


?>
        