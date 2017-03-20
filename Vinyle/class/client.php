<?php

 include_once ('utilisateur.php');
 include_once ('adresse.php');
 include_once ('commande.php');


/**********************CLIENT********************************/



    class Client extends Utilisateur{
        
        private $commande;
        private $panier;
        
        //Création Client
        public function __construct($mdp,$nom,$prenom,$mail,$adresse){
            Utilisateur::__construct($mdp,$nom,$prenom,$mail);
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

        public function setPanier($panier){
            $this->panier = $panier;
        }

        public function setAdresse($adresse){
            $this->adresse = $adresse;
            global $bdd;

            $requete = $bdd->prepare("UPDATE utilisateur SET adresse = ? WHERE id = ? ");
            $requete->execute(array($adresse,$this->getId()));
        }

        /* Selection des adresses d'un utilisateur en fonction de la table adresse et commande_utilisateur*/


        public function mesAdresseLivraison(){
            global $bdd;

            $requete = $bdd->prepare("SELECT adresse FROM (adresse INNER JOIN commande_utilisateur ON adresse.id_commande = commande_utilisateur.id_commande) WHERE  id_utilisateur = ?");

            $requete->execute( array( $this->getId() ) );
            $resultat = $requete->fetchColumn();

        }
        
        public function connexion_client($mdp, $mail){
            $this->connexion( "client", $mdp, $mail);
        }

         public function deconnexion_client( $mdp, $mail){
            $this->deconnexion( "client", $mdp, $mail);
        }


         /*  Ajout d'un client dans la base de donnée*/
         public function ajoutBdd(){
            global $bdd;
            /*  Selection de l'id d'un client en fonction son mail et de son type 'client' dans la table utilisateur */ 
            $requete = $bdd->prepare("SELECT id FROM utilisateur WHERE mail = ? AND type = 'client' ");

            $requete->execute( array( $this->getMail() ) );
            $resultat = $requete->fetchColumn();
             /* Verifie si le client est deja dans la base de donnée*/
            if($resultat != NULL)
                echo "Un utilisateur avec la meme adresse mail existe déjà existe deja !";

            /* Insere dans la table utilisateur les données du client */
            else{
                $requete = $bdd->prepare("INSERT INTO utilisateur VALUES ('','client',?,?,?,?,?)");
            $requete->execute( array($this->getMdp(),$this->getNom(),$this->getPrenom(),$this->getMail(), $this->getAdresse() ) );

            $requete = $bdd->prepare("SELECT MAX(id) FROM utilisateur");
                    $requete->execute( array() );
                    $this->setId($requete->fetchColumn());

            }

        }



        public function panier(){
            $this->setPanier(Commande::getInstance() );
            $this->getPanier()->ajoutBdd( $this->getId() );
        }

        public function ajoutProduitPanier($id_produit){
            $this->getPanier()->ajoutProduit($id_produit);
        }

        public function retirerProduitPanier($id_produit){
            $this->getPanier()->retirer_produit($id_produit);
        }
        /* Selection des commandes en fonction de leurs id dans la table commande_utilisateur et commande*/

        public function lesCommandes(){
            global $bdd;
            $requete = $bdd->prepare("SELECT id_commande FROM ( commande_utilisateur INNER JOIN commande ON commande.id =  id_commande) WHERE id_utilisateur = ? ");

            $requete->execute( array( $this->getId()) );
            $resultat = $requete->fetchAll();
        }

        public function acheter($adresse){
            $this->getPanier()->valide_commande($adresse);
            $this->setPanier(null);
        }

        public function noter($id_produit,$note){
            $panier->note($id_utilisateur,$id_produit, $note);
        }


    }



    /*
    
    $client = new Client("mdp","nom","prenom","maiiiiiiloooo","adresse");
    $client->ajoutBdd();


    $client->setAdresse("la mort");
    $client->Panier();
    $client->ajoutProduitPanier(274);
    $client->ajoutProduitPanier(530);
    $client->ajoutProduitPanier(275);
    $client->acheter("chez moi");
    $client->Panier();
    $client->ajoutProduitPanier(531);
    $client->ajoutProduitPanier(276);
    $client->ajoutProduitPanier(532);
    $client->acheter("ghjh");
    $client->mesAdresseLivraison();
    */
    
    ?>

