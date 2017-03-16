<?php
    include_once 'produit.php';

    class Coffret extends Produit{
        function __construct($nom,$image,$musique,$prix,$tag,$artiste,$description,$genre) {
            Produit::__construct($nom,$image,$musique,$prix,$tag,$artiste,$description,$genre);
            $this->type = "Kit";
        }

        public function ajoutBddCoffret(){
            Produit::ajoutBdd("Coffret");
        }
    }
    
    /*
    $nom = "This time around";
	$image = "image";
	$musique = "musique";
	$prix = 99.99;
	$tag = array('a' => "KingOfPop", 'b' => "EastCoast", 'c' => "BigPopa", 'd' => "BadBoyRecords");
	$mj = new Artiste("Michael Jackson", "Artiste de varieté le plus courroner de tous les temps", "image");
	$biggie = new Artiste("Notorious BIG", "la star du label Bad Boy", "image");
	$artiste = array('a' => $mj, 'b' => $biggie);
	$description = "Un des deux morceaux où le KingOfPop collabore avec la star du label Bad Boy ";

	$vinyle = new Coffret($nom,$image,$musique,$prix,$tag,$artiste,$description,"pop");
	$vinyle->ajoutBddKit();
    */

?>