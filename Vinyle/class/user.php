<?php
    include ('../class/*');
    include ('../connexion/connexion.php');
    
            abstract class Utilisateur {
                protected $id;
                protected $identifiant;
                protected $mdp;
                protected $nom;
                protected $prenom;
                protected $mail;
                
                protected function __construct($identifiant,$mdp,$nom,$prenom,$mail){
                    this.$identifiant = $identifiant;
                    this.$mdp = $mdp;
                    this.$nom = $nom;
                    this.$prenom = $prenom;
                    this.$mail = $mail;
                                        
                    global $connexion;
                    $requete = $connexion->prepare("INSERT INTO utilisateur VALUES ('','',?,?,?,?,?,'','','','')");
                    $requete->execute( array($identifiant,$mdp,$nom,$prenom,$mail) );
                    
                    $requete = $connexion->prepare("SELECT MAX(id) FROM utilisateur");
                    $requete->execute( array() );
                    this.$id = fetch();
                    
                }
                
                //Suppression User
                public function __destruct() {
                    global $connexion;
                    $requete = $connexion->prepare("DELETE * FROM utilisateur  WHERE id = ?");
                    $requete->execute( array(this.$id) );
                }
                
                //Connexion
                protected function connexion($identifiant,$mdp,$type){
                    session_start();
                    global $connexion;
                    $requete = $connexion->prepare("SELECT * FROM utilisateur  WHERE id = ? AND mdp = ? AND type = ?");
                    $requete->execute( array(this.$id,$mdp,$type) );
                    if($user_id != NULL){
                            return $_SESSION['id'];
                        }
                    else{
                            echo "<br/><b> Mauvais login ou mauvais mot de passe, merci de réessayer. </b>";
                        }
                }
                
                //Connexion
                protected function deconnexion($identifiant,$mdp,$type){
                    unset($_SESSION['user_id']);
                }
            }
            
        ?>

