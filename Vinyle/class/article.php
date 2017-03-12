<?php
    include_once ('objet.php');
    
    class Article extends Objet{

        private $nom;
        private $text;
        private $image;
        private $tag;

        function __construct($nom,$text,$image,$tag) {
            $this->nom = $nom;
            $this->text = $text;
            $this->image = $image;
            $this->tag = $tag;
        }

         public function getNom(){
            return $this->nom;
        }

        public function getText(){
            return $this->text;
        }

        public function getImage(){
            return $this->image;
        }

        public function getTag(){
            return $this->tag;
        }

        public function setNom($nom){
        	global $bdd;

            $requete = $bdd->prepare("UPDATE article SET nom = ?  WHERE id = ?");
            $requete->execute( array($nom, $this->getId()) );

            $this->nom = $nom;


        }


        public function setText($text){
        	global $bdd;

            $requete = $bdd->prepare("UPDATE article SET contenu = ?  WHERE id = ?");
            $requete->execute( array($text, $this->getId()) );

            $this->text = $text;
        }

        public function setImage($image){
            global $bdd;

            $requete = $bdd->prepare("UPDATE article SET image = ?  WHERE id = ?");
            $requete->execute( array($image, $this->getId()) );

             $this->image = $image;

        }


        public function ajoutBdd(){
        	global $bdd;

            $requete = $bdd->prepare("SELECT * FROM article WHERE nom = ? AND contenu = ? AND image = ?");

            $requete->execute( array( $this->getNom(), $this->getText(), $this->getImage() ) );
            $resultat = $requete->fetch();

            if($resultat != NULL)
                echo "Article déjà présent";

            else{

                $requete = $bdd->prepare("INSERT INTO article VALUES ('',?,?,?)");
                $requete->execute( array( $this->getNom(), $this->getText(), $this->getImage() ) );

                $requete = $bdd->prepare("SELECT MAX(id) FROM article");
                $requete->execute( array() );
                $this->setId($requete->fetchColumn());

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


	            	$requete = $bdd->prepare("INSERT INTO article_tag VALUES ('',?,?)");
	        		$requete->execute( array( $this->getId(), $resultat ) );
	            }
        	}
        }
   
    }


    $nom = "Death Row vs Bad Boy" ;
    $text = "Tupac et Biggie";
    $image = "imagic";
    $tag = array('a' => "TWD",'b' => "Rick", 'c' => "Carl"  );
    $article = new Article($nom,$text,$image,$tag);
    $article->ajoutBdd();
    //echo $article->getId();
    $article->setImage("East Coast vs West Coast");

    