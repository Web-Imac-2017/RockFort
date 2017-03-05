<?php
    include ('client.php');
    include ('produit.php');


   /**************ADMIN*************************/

    class Admin extends Utilisateur {
        private $article;

        public function __construct($identifiant,$mdp,$nom,$prenom,$mail){
            Utilisateur::__construct($identifiant,$mdp,$nom,$prenom,$mail);
        }

        public function getArticle(){
            return $this->article;
        }

        public


        public function ajoutBdd(){
            global $bdd;

            $requete = $bdd->prepare("SELECT * FROM utilisateur WHERE identifiant = ? AND motDePasse = ? AND nom = ? AND prenom = ? AND mail = ? AND type = 'admin' ");

            $requete->execute( array( $this->getIdentifiant(), $this->getMdp(), $this->getNom(), $this->getPrenom(), $this->getMail() ) );
            $resultat = $requete->fetch();

            if($resultat != NULL)
                echo "Un administrateur avec les même données existe déjà !";

            else{

                $requete = $bdd->prepare("INSERT INTO utilisateur VALUES ('','admin',?,?,?,?,?,'','','','')");
            $requete->execute( array($this->getIdentifiant(),$this->getMdp(),$this->getNom(),$this->getPrenom(),$this->getMail() ) );

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

    }

    $client = new Admin("identifient","mdp","nom","prenom","mail");
    //$client->deconnexion_admin($client->getMdp(), $client->getMail() );
    $client->suppression_produit_id(19);

?>

