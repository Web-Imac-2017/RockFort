<?php
    include_once '../connexion/connexion.php';
    include '../class/*';
    include '../connexion/*';

    class Artiste{
        private $id;
        private $nom;
        private $description;
        private $image;
        
        public function __construct($nom,$description,$image) {
            $this->nom = $nom;
            $this->description = $description;
            $this->image = $image;
        }

    public function getId(){
        return $this->id;
    }

    public function setId($id){
        $this->id = $id;
    }

    public function getNom(){
        return $this->nom;
    }

    public function getDescription(){
        return $this->description;
    }

    public function setDescription($description){
        $this->id = $id;
    }

    public function getImage(){
        return $this->image;
    }

    public function setImage($image){
        $this->image = $image;
    }

    public function ajoutBdd(){
        global $bdd;

        $requete = $bdd->prepare("SELECT id FROM artiste WHERE nom = ? AND description = ? AND image = ? ");

        $requete->execute( array( $this->getNom(), $this->getDescription(), $this->getImage() ) );
        $resultat = $requete->fetchColumn();

        if($resultat != NULL)
                echo "Artiste déjà présent dans la base de donnée";

        else{
                $requete = $bdd->prepare("INSERT INTO artiste VALUES ('',?,?,?)");
                $requete->execute( array( $this->getNom(), $this->getDescription(), $this->getImage() ) );
                $requete = $bdd->prepare("SELECT MAX(id) FROM artiste");
                    $requete->execute( array() );
                    $this->setId($requete->fetchColumn());
                }
    }

}
    /*
    $artiste = new Artiste("Michael Jackson", "Artiste de varieté le plus courroner de tous les temps", "image");
    $artiste->ajoutBdd();
    echo $artiste->getId();
    */
?> 

