<?php
include '../connexion/connexion.php';
include 'client.php';

/*********************************ADRESSE*********************************/

class Adresse{
    private $id;
    private $id_commande;
    private $adresse;
    private $ville;
    private $region;
    private $pays;

    public function __construct($id_commande,$adresse,$ville,$region,$pays){
        $this->$id_commande = $id_commande;
        $this->$adresse = $adresse;
        $this->$ville = $ville;
        $this->$region = $region;
        $this->$pays = $pays;
    }

    public function getIdCommande(){
        return $this->id_commande;
    }

    public function getAdresse(){
        return $this->adresse;
    }

    public function getVille(){
        return $this->ville;
    }

    public function getRegion(){
        return $this->region;
    }

    public function getPays(){
        return $this->pays;
    }

    public function ajoutBdd(){
        global $bdd;

        $requete = $bdd->prepare("SELECT id FROM adresse WHERE id_commande = ?");

        $requete->execute( array( $this->getIdCommande() ) ); //récupérer id de la commande du client
        $resultat = $requete->fetchColumn();

        if($resultat != NULL)
            echo "Une adresse est déjà associée à cette commande.";

        else{
            $requete = $bdd->prepare("INSERT INTO adresse (id_commande,adresse,ville,region,pays) VALUES (?,?,?,?,?)");
            $requete->execute( array($this->getIdCommande(),$this->getAdresse(),$this->getVille(),$this->getRegion(),$this->getPays() ) );
        }

    }

    public function majBdd(){
        global $bdd;

        $requete = $bdd->prepare("SELECT id FROM adresse WHERE id_commande = ?");

        $requete->execute( array( $this->getIdCommande() ) ); //récupérer id de la commande du client
        $resultat = $requete->fetchColumn();

        if($resultat != NULL){
            $requete = $bdd->prepare("UPDATE adresse SET adresse=?,ville=?,region=?,pays=? WHERE id_commande=?");
            $requete->execute( array($this->getAdresse(),$this->getVille(),$this->getRegion(),$this->getPays(),$this->getIdCommande() ) );
        }else{
            echo "Pas d'adresse à remplacer.";
        }

    }

    public function supprBdd(){
        global $bdd;

        $requete = $bdd->prepare("SELECT id FROM adresse WHERE id_commande = ?");

        $requete->execute( array( $this->getIdCommande() ) ); //récupérer id de la commande du client
        $resultat = $requete->fetchColumn();

        if($resultat != NULL){
            $requete = $bdd->prepare("DELETE FROM adresse WHERE id_commande=?");
            $requete->execute( array($this->getIdCommande()) );
        }else{
            echo "Pas d'adresse à supprimer.";
        }

    }
}
?>