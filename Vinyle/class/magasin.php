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
        /*
         * Utilisation du singleton pour comprendre voir commande.php
         */
        
        private static $instance = null;
        private function __construct($superAdmin){
            $this->superAdmin = $superAdmin;
            $this->utilisateur = array();
            $this->stock = array();
        }


         /* crée une intance de magasin si inexistante   */
        public static function getInstance($superAdmin){
            if(self::$instance == NULL){
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

        public function note($type,$nom,$description,$image,$musique,$prix){
            global $bdd;

            $requete = $bdd->prepare("SELECT AVG(note) FROM (note INNER JOIN produit ON id_produit = produit.id) WHERE type = ? AND nom = ? AND description = ? AND image = ? AND musique = ? AND prix = ?");
            $requete->execute( array( $type,$nom,$description,$image,$musique,$prix ) );
            $resultat = $requete->fetchColumn();
            
            return $resultat;

        }

        public function commentaire($type,$nom,$description,$image,$musique,$prix){
            global $bdd;

            $requete = $bdd->prepare("SELECT contenu FROM (commentaire INNER JOIN produit ON id_produit = produit.id) WHERE type = ? AND nom = ? AND description = ? AND image = ? AND musique = ? AND prix = ?");
            $requete->execute( array( $type,$nom,$description,$image,$musique,$prix ) );
            $resultat = $requete->fetchAll();
            print_r($resultat);
            
            return $resultat;

        }

        /* Verifie le stock des produits et envoie un mail a l'admin s'il est inférieur a 10 */
        public function stock($type,$nom,$description,$image,$musique,$prix){
            global $bdd;

            $requete = $bdd->prepare("SELECT COUNT(id) FROM produit WHERE type = ? AND nom = ? AND description = ? AND image = ? AND musique = ? AND prix = ?");
            $requete->execute( array( $type,$nom,$description,$image,$musique,$prix ) );
            $resultat = $requete->fetchColumn();
            
            if($resultat <= 10){
                echo "Attention il vous reste moins de 10 article de ce type";
                $headers  = 'MIME-Version: 1.0' . "\r\n";
                $headers .= 'Content-type: text/html; charset=utf-8' . "\r\n";
                $headers .= 'FROM:alexane.lgrn@gmail.com';
                $to = 'alexane.lgrn@gmail.com'; //Insérer adresse email ICI
                $subject = 'Alerte : stock faible';
                $message_content = '
                  <table>
                  <tr>
                  <td>Le stock pour le produit suivant est faible:</td>
                  </tr>
                  <tr>
                  <td>'. $type . ' : '.$nom.'</td>
                  </tr>
                  <tr>
                  <td><b>Il en reste:</b></td>
                  </tr>
                  <tr>
                  <td>'. $resultat .'</td>
                  </tr>
                  </table>
                  ';
                mail($to, $subject, $message_content, $headers);
            }            
            return $resultat;
        }

        public function selectGenre($genre){
            global $bdd;

            $requete = $bdd->prepare("SELECT id FROM produit WHERE genre = ?");
            $requete->execute( array( $genre ) );
            $resultat = $requete->fetchColumn();
            print_r($resultat);
                  
            return $resultat;
        }        

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
>>>>>>> magasin


    $nom = "Tabloid Junkie";
    $image = "imagehei";
    $musique = "Le meilleur son de l'album HISTORY";
    $prix = 299;
    $tag = array('a' => "KingOfPop", 'b' => "HISTORY", 'c' => "JFK", 'd' => "MarilynMonroe");
    $mj = new Artiste("Michael Jackson", "Artiste de varieté le plus courroner de tous les temps", "image");
    $biggie = new Artiste("Notorious BIG", "la star du label Bad Boy", "image");
    $artiste = array('a' => $mj);
    $description = "Chanson 100% réalisé par MJ dans l'album HISTORY ";

    $vinyle = new Kit($nom,$image,$musique,$prix,$tag,$artiste,$description,"pop");

    $magasin->selectGenre("pop");
    //$magasin->allProduit();


?>

