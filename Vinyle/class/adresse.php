<?php
    include '../connexion/connexion.php';
    include 'client.php';

   /*********************************ADRESSE*********************************/

    class Adresse{
        private $numero;
        private $rue;
        private $code_postale;
        private $ville;
        private $region;
        private $pays;
        
        public function __construct($numero,$rue,$code_postale,$ville,$region,$pays){
            $this->$numero = $numero;
            $this->$rue = $rue;
            $this->$code_postale = $code_postale;
            $this->$ville = $ville;
            $this->$region = $region;
            $this->$pays = $pays;
        } 
        

        public function getNumero(){
            return $this->numero;
        }

        public function getRue(){
            return $this->rue;
        }

        public function getCode_Postale(){
            return $this->code_postale;
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

            $requete->execute( array( $this->getCommande() ) ); //récupérer id de la commande du client
            $resultat = $requete->fetchColumn();

            if($resultat != NULL)
                echo "Une adresse est déjà associée à cette commande.";

            else{
                $requete = $bdd->prepare("INSERT INTO adresse (id_commande,adresse,ville,region,pays) VALUES (?,?,?,?,?)");
                $requete->execute( array($this->getCommande(),$this->getNumero().' '.$this->getRue(),$this->getVille(),$this->getRegion(),$this->getPays() ) );
            }

        }

        public function majBdd(){
            global $bdd;

            $requete = $bdd->prepare("SELECT id FROM adresse WHERE id_commande = ?");

            $requete->execute( array( $this->getCommande() ) ); //récupérer id de la commande du client
            $resultat = $requete->fetchColumn();

            if($resultat != NULL){
                $requete = $bdd->prepare("UPDATE adresse SET adresse=?,ville=?,region=?,pays=? WHERE id_commande=?");
                $requete->execute( array($this->getNumero().' '.$this->getRue(),$this->getVille(),$this->getRegion(),$this->getPays(),$this->getCommande() ) );
            }else{
                echo "Pas d'adresse à remplacer.";
            }

        }

        public function supprBdd(){
            global $bdd;

            $requete = $bdd->prepare("SELECT id FROM adresse WHERE id_commande = ?");

            $requete->execute( array( $this->getCommande() ) ); //récupérer id de la commande du client
            $resultat = $requete->fetchColumn();

            if($resultat != NULL){
                $requete = $bdd->prepare("DELETE FROM adresse WHERE id_commande=?");
                $requete->execute( array($this->getNumero().' '.$this->getRue(),$this->getVille(),$this->getRegion(),$this->getPays(),$this->getCommande() ) );
            }else{
                echo "Pas d'adresse à supprimer.";
            }

        }
    }
?>