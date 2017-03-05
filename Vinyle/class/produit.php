<?php
    include ('../connexion/connexion.php');
    include ('objet.php');
    include ('artiste.php');



    abstract class Produit extends Objet{
        protected $nom;
        protected $image;
        protected $musique;
        protected $prix;
        protected $tag;
        protected $artiste;
        protected $description;
        protected $commentaire;
        protected $note;
        protected $type;
        


        protected function __construct($nom,$image,$musique,$prix,$tag,$artiste,$description){
            $this->nom = $nom;
            $this->image = $image;
            $this->musique = $musique;
            $this->prix = $prix;
            $this->tag = $tag;
            $this->artiste = $artiste;
            $this->description = $description;
        }

        public function getNom(){
        	return $this->nom;
        }

        public function getImage(){
        	return $this->image;
        }

        public function getMusique(){
        	return $this->musique;
        }

        public function getPrix(){
        	return $this->prix;
        }

        public function getTag(){
        	return $this->tag;
        }

        public function getArtiste(){
        	return $this->artiste;
        }

        public function getDescription(){
        	return $this->description;
        }

        public function getCommentaire(){
        	return $this->commentaire;
        }

        public function getNote(){
        	return $this->note;
        }

        public function getType(){
        	return $this->type;
        }


        protected function ajoutBdd($type){
        	global $bdd;
	        $requete = $bdd->prepare("INSERT INTO produit VALUES ('',?,?,?,?,?,?)");
	        $requete->execute( array( $this->getType(), $this->getNom(), $this->getDescription(), $this->getImage(), $this->getMusique(), $this->getPrix() ) );


	        $requete = $bdd->prepare("SELECT MAX(id) FROM produit");
	        $requete->execute( array() );
	        $this->setId($requete->fetchColumn());


	        foreach ($this->getArtiste() as $artiste){
	        	$artiste->ajoutBdd();

	        	$requete = $bdd->prepare(" SELECT id FROM artiste WHERE nom = ?");
	        	$requete->execute( array( $artiste->getNom() ) );
	        	$id = $requete->fetchColumn();

	        	$requete = $bdd->prepare("INSERT INTO produit_artiste VALUES ('',?,?)");
	        	$requete->execute( array( $this->getId(), $id ) );
	        }
	        
	        foreach ($this->getTag() as $tag) {

	        	$requete = $bdd->prepare("SELECT id FROM tag WHERE nom = ? ");
            	$requete->execute( array( $tag ) );
            	$resultat = $requete->fetchColumn();

	            if($resultat == NULL){
	            	$requete = $bdd->prepare("INSERT INTO tag VALUES ('',?)");
            		$requete->execute( array( $tag ) );
	            }

	            else{


	            	$requete = $bdd->prepare("SELECT id FROM tag WHERE nom = ? ");
            		$requete->execute( array( $tag ) );
            		$resultat = $requete->fetchColumn();


	            	$requete = $bdd->prepare("INSERT INTO produit_tag VALUES ('',?,?)");
	        		$requete->execute( array( $this->getId(), $resultat ) );
	            }

	        }

	    }




    }
?>