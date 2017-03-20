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

        /*  Ajout d'un amdinistrateur dans la base de donnée*/

        public function ajoutBdd(){
            global $bdd;
            /*  Selection des données d'un admin dans la table utilisateur */ 
            $requete = $bdd->prepare("SELECT * FROM utilisateur WHERE  motDePasse = ? AND nom = ? AND prenom = ? AND mail = ? AND type = 'admin' ");

            /* execution de la requete SQL */ 
            $requete->execute( array( $this->getMdp(), $this->getNom(), $this->getPrenom(), $this->getMail() ) );
            $resultat = $requete->fetchAll();

            /* Verifie si l'administrateur est deja dans la base de donnée*/
            if($resultat != NULL)
                echo "Un administrateur avec les même données existe déjà !";

            else{

            	/* Insere dans la table utilisateur les données de l'amdin */
                $requete = $bdd->prepare("INSERT INTO utilisateur VALUES ('','admin',?,?,?,?,'')");
                $requete->execute( array($this->getMdp(),$this->getNom(),$this->getPrenom(),$this->getMail() ) );
              
                /*Affecte le dernier id de la table utilisateur au nouvel administrateur*/ 

                $requete = $bdd->prepare("SELECT MAX(id) FROM utilisateur");
                $requete->execute( array() );
                $this->setId($requete->fetchColumn());

            }
         }

        public function connexion_admin($mdp, $mail){
            $this->connexion( "admin", $mdp, $mail);
        }
        /*  ferme une session */
        public function deconnexion_admin( $mdp, $mail){
            $this->deconnexion( "admin", $mdp, $mail);
        }

       /* Permet de mettre un jour/modifier un produit*/
         public function modif_descrition_produit($description, $produit_nom){
            global $bdd;
            $requete = $bdd->prepare("UPDATE produit SET description = ?  WHERE nom = ?");
            $requete->execute( array( $description, $produit_nom ) );

        }

        /* met à jour/ modifie une image*/
        public function modif_image_produit($image, $produit_nom){
            global $bdd;
            $requete = $bdd->prepare("UPDATE produit SET image = ?  WHERE nom = ?");
            $requete->execute( array( $image, $produit_nom ) );

        }
        /* met à jour/ modifie le prix d'un produit*/
        public function modif_prix_produit($prix, $produit_nom){
            global $bdd;
            $requete = $bdd->prepare("UPDATE produit SET prix = ?  WHERE nom = ?");
            $requete->execute( array( $prix, $produit_nom ) );

        }
        /* Supprime le produit depuis son identifiant */
        public function suppression_produit_id($id_produit){
            global $bdd;

            /* Selectionne l'id en fonction de sa table */ 

            $requete = $bdd->prepare(" DELETE FROM produit WHERE id = ?");
            $requete->execute( array( $id_produit ) );

            $requete = $bdd->prepare(" DELETE FROM produit_artiste WHERE id_produit = ?");
            $requete->execute( array( $id_produit ) );

            $requete = $bdd->prepare(" DELETE FROM produit_tag WHERE id_produit = ?");
            $requete->execute( array( $id_produit ) );
        }

        /* Supprime un produit via son nom */
       public function suppression_produit_nom($nom_produit){
            global $bdd;

            $requete = $bdd->prepare(" SELECT Distinct (id) FROM produit WHERE  nom = ?"); 
            $requete->execute( array( $nom_produit ) );
            $id = $requete->fetchAll();

            /* Supprime les produits un par un en fonction de l'id */ 
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

        /* Supprime un produit selon son type et son nom */
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
        /* Supprime un article en fonction de son id */
        public function suppression_article_id($id_article){
            global $bdd;
            $requete = $bdd->prepare(" DELETE FROM article WHERE id = ?");
            $requete->execute( array( $id_article ) );

            $requete = $bdd->prepare(" DELETE FROM article_tag WHERE id_article = ?");
            $requete->execute( array( $id_article ) );

        }
        /* Supprime un article en fonction de son nom */ 
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

         /* ouvre une session avec les données de l'administrateur*/ 
        public function connexion_admin($mdp, $mail){
            $this->connexion( "admin", $mdp, $mail);
        }
        /*  ferme une session */
        public function deconnexion_admin( $mdp, $mail){
            $this->deconnexion( "admin", $mdp, $mail);
        }

       /* Permet de mettre un jour/modifier un produit*/
         public function modif_descrition_produit($description, $produit_nom){
            global $bdd;
            $requete = $bdd->prepare("UPDATE produit SET description = ?  WHERE nom = ?");
            $requete->execute( array( $description, $produit_nom ) );

        }

        /* met à jour/ modifie une image*/
        public function modif_image_produit($image, $produit_nom){
            global $bdd;
            $requete = $bdd->prepare("UPDATE produit SET image = ?  WHERE nom = ?");
            $requete->execute( array( $image, $produit_nom ) );

        }
        /* met à jour/ modifie le prix d'un produit*/
        public function modif_prix_produit($prix, $produit_nom){
            global $bdd;
            $requete = $bdd->prepare("UPDATE produit SET prix = ?  WHERE nom = ?");
            $requete->execute( array( $prix, $produit_nom ) );

        }
        /* Supprime le produit depuis son identifiant */
        public function suppression_produit_id($id_produit){
            global $bdd;

            /* Selectionne l'id en fonction de sa table */ 

            $requete = $bdd->prepare(" DELETE FROM produit WHERE id = ?");
            $requete->execute( array( $id_produit ) );

            $requete = $bdd->prepare(" DELETE FROM produit_artiste WHERE id_produit = ?");
            $requete->execute( array( $id_produit ) );

            $requete = $bdd->prepare(" DELETE FROM produit_tag WHERE id_produit = ?");
            $requete->execute( array( $id_produit ) );
        }

        /* Supprime un produit via son nom */
       public function suppression_produit_nom($nom_produit){
            global $bdd;

            $requete = $bdd->prepare(" SELECT Distinct (id) FROM produit WHERE  nom = ?"); 
            $requete->execute( array( $nom_produit ) );
            $id = $requete->fetchAll();

            /* Supprime les produits un par un en fonction de l'id */ 
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

        /* Supprime un produit selon son type et son nom */
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
        /* Supprime un article en fonction de son id */
        public function suppression_article_id($id_article){
            global $bdd;
            $requete = $bdd->prepare(" DELETE FROM article WHERE id = ?");
            $requete->execute( array( $id_article ) );

            $requete = $bdd->prepare(" DELETE FROM article_tag WHERE id_article = ?");
            $requete->execute( array( $id_article ) );

        }
        /* Supprime un article en fonction de son nom */ 
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


    $admin = new Admin("mdp","fffnom","gbprenom","uhmkkkkhail");
    $admin->ajoutBdd()
 

?>

