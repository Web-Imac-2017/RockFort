<?php
    include_once '../connexion/connexion.php';
    include_once 'album.php';
    include_once 'platine.php';
    include_once 'vinyle.php';
    
    class Commande {
        private $id;
        private $date;
        private $montant;
        
        /*Utilisation du Singleton
         * 
         * Le but du singleton est de créer qu'une unique instance d'un même objet  
         * 
         * Le singleton consiste à mettre le constructeur en privée
         * à créer une variable contenant une instance de l'objet en privée et static 
         *** (static permet d'appeler un attribut ou même une fonction sans créer d'instance de la classe)
         *** (instancier une classe c'est donner des caractéristique à la classe qu'on a défini et déclarer, on instancie à l'aide du constructeur)
         * Avec le constructeur en privé il nous est impossible d'instancier une variable directement
         * C'est pourquoi on créer une methode static (ici getInstance) pour vérifier si une instance de la classe existe déjà et la créer si besoin.
         * ****Rappel: static permet d'appeler un attribut ou même une fonction sans créer d'instance de la classe, on peut donc avoir accès à instance et à getInstance() sans instancier notre classe
         * **** (DAB!) 
         */
        
        private static $instance;
        
        private function __construct(){
        	$this->produit_list = array();
        }
        
        public static function getInstance(){
            if (self::$instance == null){
                self::$instance = new Commande();
            }
            return self::$instance;
        }

        public function getId(){
        	return $this->getInstance()->id;
        }

        public function setId($id){
        	$this->getInstance()->id = $id;
        }

		public function getProduit_List(){
        	return $this->getInstance()->produit_list;
        }


        public function getDate(){
        	return $this->getInstance()->$date;
        }

		public function setDate($date){
        	$this->getInstance()->date = $date;
        }

		
		public function getMontant(){
        	return $this->getInstance()->$montant;
        }  


        public function ajoutBdd($id_client){
        	global $bdd;
        	$requete = $bdd->prepare("INSERT INTO commande VALUES ('',?,NOW(),'','')");
	        $requete->execute( array( $id_client) );

	        $requete= $bdd->prepare("SELECT MAX(id) FROM commande");
			$requete->execute( array( ) );
			$id = $requete->fetchColumn();

			$this->getInstance()->setId($id);

        	$requete = $bdd->prepare("INSERT INTO commande_utilisateur VALUES ('',?,?)");
	        $requete->execute( array( $this->getInstance()->getId(), $id_client) );

        }

        public function ajoutProduit($id_produit){
        	global $bdd;

            $requete = $bdd->prepare("SELECT achete FROM produit WHERE id = ?");
            $requete->execute( array( $id_produit) );
            $achete = $prix = $requete->fetchColumn();

            if ($achete == 0) {
                
                $requete = $bdd->prepare("INSERT INTO commande_produit VALUES ('',?,?)");
                $requete->execute( array( $this->getInstance()->getId(),$id_produit) );

                $requete = $bdd->prepare("SELECT prix FROM produit WHERE id = ?");
                $requete->execute( array( $id_produit) );
                $prix = $requete->fetchColumn();

                $requete = $bdd->prepare("SELECT ttc FROM commande WHERE id = ?");
                $requete->execute( array( $this->getInstance()->getId() ) );
                $ttc = $requete->fetchColumn();

                $requete = $bdd->prepare("UPDATE commande SET ttc = ? + ? WHERE id = ?");
                $requete->execute( array( $prix, $ttc, $this->getInstance()->getId() ) );


                $requete = $bdd->prepare("SELECT id FROM produit WHERE id = ?");
                $requete->execute( array( $id_produit) );
                $info = $requete->fetchColumn();
            }

            else{
                echo "Produit déjà acheté";
            }

        	



	        }
      
        
        public function retirer_produit($id_produit){
            global $bdd;
        	$requete = $bdd->prepare("DELETE FROM commande_produit WHERE id_produit = ?");
	        $requete->execute( array( $id_produit) );

	        $requete = $bdd->prepare("SELECT prix FROM produit WHERE id = ?");
	        $requete->execute( array( $id_produit) );
	        $prix = $requete->fetchColumn();

	        $requete = $bdd->prepare("SELECT ttc FROM commande WHERE id = ?");
	        $requete->execute( array( $this->getInstance()->getId() ) );
	        $ttc = $requete->fetchColumn();

	        $requete = $bdd->prepare("UPDATE commande SET ttc = ? - ? WHERE id = ?");
	        $requete->execute( array($ttc,  $prix, $this->getInstance()->getId() ) );
        }
        

        public function valide_commande($adresse){
        	global $bdd;
        	$requete = $bdd->prepare("UPDATE commande SET valide = '1' WHERE id = ?");
	        $requete->execute( array( $this->getInstance()->getId()) );


            $requete = $bdd->prepare("UPDATE produit SET achete = '1' WHERE id IN (SELECT id_produit FROM commande_produit WHERE id_commande = ?)");
            $requete->execute( array( $this->getInstance()->getId() ) );

            $requete = $bdd->prepare("UPDATE commande SET valide = '1' WHERE id = ?");
            $requete->execute( array( $this->getInstance()->getId()) );

            $requete = $bdd->prepare("INSERT INTO adresse VALUES ('',?,?)");
            $requete->execute( array( $this->getInstance()->getId(), $adresse) );
        }


        public function note($id_utilisateur,$id_produit, $note){
            global $bdd;
            $requete = $bdd->prepare("SELECT id_produit FROM ( commande_produit INNER JOIN  commande ON id_commande = commande.id) WHERE id_produit = ? AND valide = '1' ");
            $requete->execute( array( $id_produit ) );
            $produit = $requete->fetchColumn();

            if ($produit == null) {
                echo "Vous n'avez pas acheté ce produit vous ne pouvez pas le noter";
            }

            else{
                $requete = $bdd->prepare("SELECT id FROM note WHERE id_produit = ? AND id_utilisateur = ?");

                $requete->execute( array($id_produit,$id_utilisateur));
                $resultat = $requete->fetchColumn();

                if($resultat != null){
                    echo "Vous avez déjà noté le produit";
                }

                else{
                    $requete = $bdd->prepare("INSERT INTO note VALUES ('',?,?,?)");
                    $requete->execute( array($note,$id_produit,$id_utilisateur) );
                }

            }
        }




        public function commentaire($id_utilisateur,$id_produit, $commentaire){
            global $bdd;
            $requete = $bdd->prepare("SELECT id_produit FROM ( commande_produit INNER JOIN  commande ON id_commande = commande.id) WHERE id_produit = ? AND valide = '1' ");
            $requete->execute( array( $id_produit ) );
            $produit = $requete->fetchColumn();

            if ($produit == null) {
                echo "Vous n'avez pas acheté ce produit vous ne pouvez pas le commenter";
            }

            else{
                $requete = $bdd->prepare("SELECT id FROM commentaire WHERE id_produit = ? AND id_utilisateur = ?");

                $requete->execute( array($id_produit,$id_utilisateur));
                $resultat = $requete->fetchColumn();

                if($resultat != null){
                    echo "Vous avez déjà commenté le produit";
                }

                else{
                    $requete = $bdd->prepare("INSERT INTO commentaire VALUES ('',?,?,?)");
                    $requete->execute( array($commentaire,$id_utilisateur,$id_produit) );
                }

            }
        }
    



    } 


    $commande = Commande::getInstance();
    $commande->ajoutBdd(89);
    $commande->ajoutProduit(137);
    /*$commande->ajoutProduit(83);
    $commande->ajoutProduit(87);*/
    $commande->valide_commande("fggh");
   /* $commande->commentaire(89,79,"MJ toujours au top!");
    $commande->commentaire(89,83,"MJ king of pop");
    $commande->commentaire(89,56,"MJ n'est pas mort");
    $commande->note(89,79,8);
    $commande->note(89,83,9);
    $commande->note(89,56,10);*/

?>