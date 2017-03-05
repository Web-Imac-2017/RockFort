<?php

 include ('utilisateur.php');

/**********************CLIENT********************************/



    class Client extends Utilisateur{
        
        private $adresse;
        private $livraison;
        private $commande;
        private $panier;
        
        //Création Client
        public function __construct($identifiant,$mdp,$nom,$prenom,$mail,$adresse){
            Utilisateur::__construct($identifiant,$mdp,$nom,$prenom,$mail);
            $this->adresse = $adresse;//new Adresse($numero,$rue,$code_postale,$ville,$region,$pays);
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
                $requete = $bdd->prepare("INSERT INTO utilisateur VALUES ('','client',?,?,?,?,?,'','','','')");
            $requete->execute( array($this->getIdentifiant(),$this->getMdp(),$this->getNom(),$this->getPrenom(),$this->getMail() ) );

            $requete = $bdd->prepare("SELECT MAX(id) FROM utilisateur");
                    $requete->execute( array() );
                    $this->setId($requete->fetchColumn());

            }

        }
    }

    $client = new Client("identifiant","mdp","nom","prenom","mail","adresse");
    $client->ajoutBdd();

    ?>