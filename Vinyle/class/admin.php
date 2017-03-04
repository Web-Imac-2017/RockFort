<?php
    include '../class/user.php';
    include '../connexion/connexion.php';

    class Admin extends Utilisateur{
        
        public function __construct($identifiant,$mdp,$nom,$prenom,$mail){
            this.super($identifiant,$mdp,$nom,$prenom,$mail);
            global $connexion;
            $requete = $connexion->prepare("UPDATE utilisateur SET type = 'adm' WHERE id = ?");
            $requete->execute( array(this.$id) );
        }
        
        public function connexionAdmin($identifiant,$mdp){
            connexion($identifiant,$mdp,"adm");
        }
        
        public function ajout($objet){
            if ($objet instanceof Client == TRUE) {
                //requete 
            }
            if ($objet instanceof Produit == TRUE){
                //requete
            }
        }
        
        public function suppression($objet){
            if ($objet instanceof Client == TRUE) {
                //requete 
            }
            if ($objet instanceof Produit == TRUE){
                //requete
            }
        }
        
        public function modification($objet){
            if ($objet instanceof Client == TRUE) {
                //requete 
            }
            if ($objet instanceof Produit == TRUE){
                //requete
            }
        }
        
        public function article($article){
            
        }
        
        
    }
?>

