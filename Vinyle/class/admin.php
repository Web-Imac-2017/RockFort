<?php
    include_once ('client.php');
    include_once ('produit.php');


   /**************ADMIN*************************/

    class Admin extends Utilisateur {
        private $article;

        public function __construct($mdp,$nom,$prenom,$mail){
            Utilisateur::__construct($mdp,$nom,$prenom,$mail);
        }

        public function getArticle(){
            return $this->article;
        }


        public function ajoutBdd(){
            global $bdd;

            $requete = $bdd->prepare("SELECT * FROM utilisateur WHERE  motDePasse = ? AND nom = ? AND prenom = ? AND mail = ? AND type = 'admin' ");

            $requete->execute( array( $this->getMdp(), $this->getNom(), $this->getPrenom(), $this->getMail() ) );
            $resultat = $requete->fetchAll();

            if($resultat != NULL)
                echo "Un administrateur avec les même données existe déjà !";

            else{

                $requete = $bdd->prepare("INSERT INTO utilisateur VALUES ('','admin',?,?,?,?,'')");
                $requete->execute( array($this->getMdp(),$this->getNom(),$this->getPrenom(),$this->getMail() ) );

                $requete = $bdd->prepare("SELECT MAX(id) FROM utilisateur");
                $requete->execute( array() );
                $this->setId($requete->fetchColumn());

            }
         }


        public function connexion_admin($mdp, $mail){
            $this->connexion( "admin", $mdp, $mail);
        }

        public function deconnexion_admin( $mdp, $mail){
            $this->deconnexion( "admin", $mdp, $mail);
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

    }

    $admin = new Admin("mdp","fffnom","gbprenom","uhmkhail");
    $admin->ajoutBdd()

?>

