<?php
    include '../connexion/connexion.php';
    include 'objet.php';


    
    abstract class Produit extends Objet{
        protected $nom;
        protected $image;
        protected $musique;
        protected $prix;
        protected $tag;
        protected $artiste;
        protected $commentaire;
        protected $note;
        protected $type;
        
        protected function __construct($id,$nom,$image,$musique,$tag,$artiste,$commentaire){
            $this->id = $id;
            $this->$nom = $nom;
            this.$image = $image;
            this.$musique = $musique;
            this.$tag = $tag;
            this.$artiste = $artiste;
            this.$commentaire = $commentaire;
        }           
    }
?>