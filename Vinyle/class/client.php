<?php
    include '../class/*';
    include '../connexion/*';

    class Client extends User{
        private $adresse;
        private $livraison;
        private $commande;
        private $panier;
        
        //Création User
        public function __construct($identifiant,$mdp,$nom,$prenom,$mail,$adresse){
            this.super($identifiant,$mdp,$nom,$prenom,$mail);
            this.$adresse = $adresse;
            
            global $connexion;
            $requete = $connexion->prepare("UPDATE utilisateur SET adresse = ?, type = 'client' WHERE id = ?");
            $requete->execute( array($adresse,this.$id) );
                   
        }
        
        public function connexionClient($identifiant,$mdp){
            connexion($identifiant,$mdp,"client");
        }
        



        public function commentaire($id,$produit){
    }
    
        public function noter($id,$note){
            
        }

        public function achat($commande){
            
        }
        
    }
