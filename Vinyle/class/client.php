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

        public function mesAdresseLivraison(){
            global $bdd;

            $requete = $bdd->prepare("SELECT adresse FROM (adresse INNER JOIN commande_utilisateur ON adresse.id_commande = commande_utilisateur.id_commande) WHERE  id_utilisateur = ?");

            $requete->execute( array( $this->getId() ) );
            $resultat = $requete->fetchColumn();
            print_r($resultat);

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

    $client = new Client("mdp","ngjom","prensom","lijhljefiekjgkhkhjhjkghjrgam","la vie");
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
    
    ?>