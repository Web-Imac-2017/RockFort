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
                

            public function __construct($identifiant,$mdp,$nom,$prenom,$mail,$adresse,$region,$ville,$pays){
                $this->identifiant = $identifiant;
                $this->mdp = $mdp;
                $this->nom = $nom;
                $this->prenom = $prenom;
                $this->mail = $mail;
                $this->adresse = $adresse;
                $this->region = $region;
                $this->ville = $ville;
                $pays->pays = $pays;
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

                public function getAdresse(){
                    return $this->adresse;
                }

                public function getRegion(){
                    return $this->region;
                }

                public function getVille(){
                    return $this->ville;
                }

                public function getPays(){
                    return $this->pays;
                }

                public function setId($id){
                    $this->id = $id;
                }

                public function connexion($type, $mdp, $mail){
                    global $bdd;
                    $requete = $bdd->prepare("SELECT id FROM utilisateur WHERE type = ? AND motDePasse = ? AND mail = ?");
                    $requete->execute(array($type, $mdp, $mail) );
                    $resultat = $requete->fetchColumn();
                    $_SESSION['id'] = $resultat;
                }

                public function deconnexion($type, $mdp, $mail){
                    global $bdd;
                    $requete = $bdd->prepare("SELECT id FROM utilisateur WHERE type = ? AND motDePasse = ? AND mail = ?");
                    $requete->execute(array($type, $mdp, $mail) );
                    $resultat = $requete->fetchColumn();

                    if($resultat == $_SESSION['id'])
                        unset($_SESSION['id']);
                }
    }
?>
