<?php
    include_once 'produit.php';
<<<<<<< HEAD


=======
>>>>>>> Fichiers aux fonctionalité opérationnel + bdd mise à jour

    class Album extends Produit{
        function __construct($nom,$image,$musique,$prix,$tag,$artiste,$description,$genre) {
            Produit::__construct($nom,$image,$musique,$prix,$tag,$artiste,$description,$genre);
            $this->type = "Album";
        }

        public function ajoutBddAlbum(){
            Produit::ajoutBdd("Album");
        }
    }

    
<<<<<<< HEAD
    /*
=======
>>>>>>> Fichiers aux fonctionalité opérationnel + bdd mise à jour

    $nom = "This time around";
	$image = "image";
	$musique = "musique";
	$prix = 99.99;
	$tag = array('a' => "KingOfPop", 'b' => "EastCoast", 'c' => "BigPopa", 'd' => "EpicRecord");
	$mj = new Artiste("Michael Jackson", "Artiste de varieté le plus courroner de tous les temps", "image");
	$biggie = new Artiste("Notorious BIG", "la star du label Bad Boy", "image");
	$artiste = array('a' => $mj, 'b' => $biggie);
	$description = "Un des deux morceaux où le KingOfPop collabore avec la star du label Bad Boy ";

<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> Fichiers aux fonctionalité opérationnel + bdd mise à jour
	$vinyle = new Album($nom,$image,$musique,$prix,$tag,$artiste,$description,"pop");
	$vinyle->ajoutBddAlbum();
*/

?>
