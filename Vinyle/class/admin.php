<?php
    include ('utilisateur.php');
    include ('client.php');


   /**************ADMIN*************************/

    class Admin extends Utilisateur {

        public function __construct($identifiant,$mdp,$nom,$prenom,$mail){
            Utilisateur::__construct($identifiant,$mdp,$nom,$prenom,$mail);
        }


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

    }

    $client = new Admin("identifient","mdp","nom","prenom","mail");
    $client->ajoutBdd();

?>

