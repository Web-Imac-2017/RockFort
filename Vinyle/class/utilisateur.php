<?php
    session_start();
    include_once ('../connexion/connexion.php');


    abstract class Utilisateur {
                protected $id;
                protected $identifiant;
                protected $mdp;
                protected $nom;
                protected $prenom;
                protected $mail;
                

            public function __construct($mdp,$nom,$prenom,$mail){
                $this->mdp = $mdp;
                $this->nom = $nom;
                $this->prenom = $prenom;
                $this->mail = $mail;
            }

                public function getId(){
                    return $this->id;
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

                public function setId($id){
                    $this->id = $id;
                }

                public function connexion(  $type, $mdp, $mail){
                    global $bdd;
                    $requete = $bdd->prepare("SELECT id FROM utilisateur WHERE type = ? AND motDePasse = ? AND mail = ?");
                    $requete->execute(array($type, $mdp, $mail) );
                    $resultat = $requete->fetchColumn();
                    $_SESSION['id'] = $resultat;
                }

                public function deconnexion(  $type, $mdp, $mail){
                    global $bdd;
                    $requete = $bdd->prepare("SELECT id FROM utilisateur WHERE type = ? AND motDePasse = ? AND mail = ?");
                    $requete->execute(array($type, $mdp, $mail) );
                    $resultat = $requete->fetchColumn();

                    if($resultat == $_SESSION['id'])
                        unset($_SESSION['id']);
                }
    }
?>
