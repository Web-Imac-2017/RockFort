<?php
    include 'produit.php';

    class Album extends Produit{
        function __construct($nom,$image,$musique,$prix,$tag,$artiste,$description) {
            Produit::__construct($nom,$image,$musique,$prix,$tag,$artiste,$description);
            $this->type = "Album";
        }

        public function ajoutBddAlbum(){
        	Produit::ajoutBdd("Album");
    	}
	}

    $nom = "This time around";
	$image = "image";
	$musique = "musique";
	$prix = 99.99;
	$tag = array('a' => "KingOfPop", 'b' => "EastCoast", 'c' => "BigPopa", 'd' => "EpicRecord");
	$mj = new Artiste("Michael Jackson", "Artiste de varieté le plus courroner de tous les temps", "image");
	$biggie = new Artiste("Notorious BIG", "la star du label Bad Boy", "image");
	$artiste = array('a' => $mj, 'b' => $biggie);
	$description = "Un des deux morceaux où le KingOfPop collabore avec la star du label Bad Boy ";

	$vinyle = new Album($nom,$image,$musique,$prix,$tag,$artiste,$description);
	$vinyle->ajoutBddAlbum();


?>