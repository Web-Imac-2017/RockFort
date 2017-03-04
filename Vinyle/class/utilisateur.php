<?php
    session_start();
    include ('../connexion/connexion.php');


    abstract class Utilisateur {
                protected $id;
                protected $identifiant;
                protected $mdp;
                protected $nom;
                protected $prenom;
                protected $mail;
                

            public function __construct($identifiant,$mdp,$nom,$prenom,$mail){
                $this->identifiant = $identifiant;
                $this->mdp = $mdp;
                $this->nom = $nom;
                $this->prenom = $prenom;
                $this->mail = $mail;
            }

                public function getId(){
                    return $this->id;
                }

                 public function getIdentifiant(){
                    return $this->identifiant;
                }

                public function getMdp(){
                    return $this->mdp;
                }

                 public function getNom(){
                    return $this->nom;
                }

                 public function getPrenom(){
                    return $this->prenom;
                }

                 public function getMail(){
                    return $this->mail;
                }

                public function setId($id){
                    $this->id = $id;
                }

                public function connexion(  $type, $mdp, $mail){
                    global $bdd;
                    $requete = $bdd->prepare("SELECT id FROM utilisateur WHERE type = ? AND motDePasse = ? AND mail = ?");
                    $requete->execute(array($type, $mdp, $mail) );
                    $resultat = $requete->fetchColumn();
                    $_SESSION['id'] = $resultat;
                }

                public function deconnexion(  $type, $mdp, $mail){
                    global $bdd;
                    $requete = $bdd->prepare("SELECT id FROM utilisateur WHERE type = ? AND motDePasse = ? AND mail = ?");
                    $requete->execute(array($type, $mdp, $mail) );
                    $resultat = $requete->fetchColumn();

                    if($resultat == $_SESSION['id'])
                        unset($_SESSION['id']);
                }
    }





    /**************ADMIN*************************/

    class Admin extends Utilisateur {

        public function __construct($identifiant,$mdp,$nom,$prenom,$mail){
            Utilisateur::__construct($identifiant,$mdp,$nom,$prenom,$mail);
        }


        public function ajoutBdd(){
            global $bdd;

            $requete = $bdd->prepare("SELECT id FROM utilisateur WHERE type = 'admin' AND identifiant = ? AND motDePasse = ? AND nom = ? AND prenom = ? AND mail = ? ");

            $requete->execute( array($this->getIdentifiant(),$this->getMdp(),$this->getNom(),$this->getPrenom(),$this->getMail() ) );
            $resultat = $requete->fetchColumn();

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

/******************SUPERADMIN***********************************************/

class superAdmin{
        private $admin;

        
        function __construct($identifiant,$mdp,$nom,$prenom,$mail){
            $this->admin = new Admin($identifiant,$mdp,$nom,$prenom,$mail);
        }

        function getAdmin(){
            return $this->admin;
        }
        
        function ajoutAdmin($id,$login,$mdp,$nom,$prenom,$mail){
            $admin = new Admin($identifiant,$mdp,$nom,$prenom,$mail);
            $admin->ajoutBdd();
        }
        
        function suppressionAdmin($id, $admin_list){
            
        }
    }









/**********************CLIENT********************************/



    class Client extends Utilisateur{
        
        private $adresse;
        private $livraison;
        private $commande;
        private $panier;
        
        //Création Client
        public function __construct($identifiant,$mdp,$nom,$prenom,$mail,$adresse){
            Utilisateur::__construct($identifiant,$mdp,$nom,$prenom,$mail);
            $this->adresse = $adresse;
        }



        public function getAdresse(){
                    return $this->adresse;
                }

        public function getLivraison(){
                    return $this->livraison;
                }

        public function getCommande(){
                    return $this->commande;
                }

        public function getPanier(){
                    return $this->panier;
                }

               
         public function connexion_client($mdp, $mail){
            $this->connexion( "client", $mdp, $mail);
        }

         public function deconnexion_client( $mdp, $mail){
            $this->deconnexion( "client", $mdp, $mail);
        }

         public function ajoutBdd(){
            global $bdd;

            $requete = $bdd->prepare("SELECT id FROM utilisateur WHERE mail = ? AND type = 'client' ");

            $requete->execute( array( $this->getMail() ) );
            $resultat = $requete->fetchColumn();

            if($resultat != NULL)
                echo "Un utilisateur avec la meme adresse mail existe déjà existe deja !";
            
            else{
                $requete = $bdd->prepare("INSERT INTO utilisateur VALUES ('','client',?,?,?,?,?,?,'','','')");
            $requete->execute( array($this->getIdentifiant(),$this->getMdp(),$this->getNom(),$this->getPrenom(),$this->getMail(),$this->getAdresse() ) );

            $requete = $bdd->prepare("SELECT MAX(id) FROM utilisateur");
                    $requete->execute( array() );
                    $this->setId($requete->fetchColumn());

            }

        }
    }
?>
