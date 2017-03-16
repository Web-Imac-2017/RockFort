<?php

namespace App\Model\Table;

use App\Model\Table;
use PDO;

class Produit extends Table
{

    private $id;
    private $type;
    private $nom;
    private $description;
    private $image;
    private $musique;
    private $prix;
    private $stock;

    protected $table = "produit";


    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @return mixed
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @return mixed
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * @return mixed
     */
    public function getMusique()
    {
        return $this->musique;
    }

    /**
     * @return mixed
     */
    public function getPrix()
    {
        return $this->prix;
    }

    /**
     * @return mixed
     */
    public function getStock()
    {
        return $this->stock;
    }

    /**
     * @param mixed $type
     */
    public function setType($type)
    {
        $this->type = $type;
    }

    /**
     * @param mixed $nom
     */
    public function setNom($nom)
    {
        $this->nom = $nom;
    }

    /**
     * @param mixed $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * @param mixed $image
     */
    public function setImage($image)
    {
        $this->image = $image;
    }

    /**
     * @param mixed $prix
     */
    public function setPrix($prix)
    {
        $this->prix = $prix;
    }

    /**
     * @param mixed $musique
     */
    public function setMusique($musique)
    {
        $this->musique = $musique;
    }

    /**
     * @param mixed $stock
     */
    public function setStock($stock)
    {
        $this->stock = $stock;
    }


    public function getAll()
    {
        $sql = "SELECT produit.*, artiste.nom as auteur, tag.nom as theme FROM produit, produit_artiste, artiste, produit_tag, 
tag 
WHERE produit_artiste.id_produit = produit.id AND produit_artiste.id_artiste = 
artiste.id AND produit_tag.id_produit = produit.id AND produit_tag.id_tag = tag.id";
        $pdo = $this->getPDO()->prepare($sql);
        $pdo->execute();
        $tousLesProduits = $pdo->fetchAll(PDO::FETCH_ASSOC);

        $products = array();
        foreach ($tousLesProduits as $p) {
            $id = $p['id'];
            if (!isset($products[$id])) {
                $products[$id] = $p;
                $products[$id]['theme'] = array();
            }
            $products[$id]['theme'][] = $p['theme'];
        }
        $products = call_user_func("array_merge", $products);

        $theme = array();
        for ($i = 0; $i < count($products); $i++) {
            $theme[$i] = implode(" ", $products[$i]["theme"]);
            $products[$i]["theme"] = $theme[$i];
        }
        return $products;
    }

    public function getById($id)
    {
        //Au pire changer BDD et mettre tag dans produit
        $sql = "SELECT produit.*, artiste.nom as auteur, tag.nom as theme FROM produit, produit_artiste, artiste, produit_tag, tag WHERE 
produit.id
 = ?
 AND produit_artiste.id_produit = ? AND produit_artiste.id_artiste = 
artiste.id 
AND produit_tag.id_produit = ? AND produit_tag.id_tag = tag.id";
        $pdo = $this->getPDO()->prepare($sql);
        $pdo->execute([$id, $id, $id]);
        $produit = $pdo->fetchAll(PDO::FETCH_ASSOC);
        $theme = [];
        foreach ($produit as $p) {
            $theme[] = $p["theme"];
        }
        $theme = implode(" ", $theme);
        $product = call_user_func_array("array_merge", $produit);
        $product["theme"] = $theme;
        return $product;
    }

    public function getVinyles()
    {
        $sql = "SELECT produit.*, artiste.nom as auteur, tag.nom as theme FROM produit, artiste, produit_artiste, tag, produit_tag 
WHERE produit.type = 'vinyle' AND produit_artiste.id_produit = produit.id AND produit_artiste.id_artiste = artiste.id
 AND produit_tag.id_produit = produit.id AND produit_tag.id_tag = tag.id";
        $pdo = $this->getPDO()->prepare($sql);
        $pdo->execute();
        $tousLesVinyles = $pdo->fetchAll(PDO::FETCH_ASSOC);

        $vyniles = array();
        foreach ($tousLesVinyles as $p) {
            $id = $p['id'];
            if (!isset($vyniles[$id])) {
                $vyniles[$id] = $p;
                $vyniles[$id]['theme'] = array();
            }
            $vyniles[$id]['theme'][] = $p['theme'];
        }
        $vyniles = call_user_func("array_merge", $vyniles);

        $theme = array();
        for ($i = 0; $i < count($vyniles); $i++) {
            $theme[$i] = implode(" ", $vyniles[$i]["theme"]);
            $vyniles[$i]["theme"] = $theme[$i];
        }
        return $vyniles;
    }

    public function getVinyleById($id)
    {
        $sql = "SELECT produit.*, artiste.nom as auteur, tag.nom as theme FROM produit, produit_artiste, artiste, produit_tag, tag WHERE 
produit.id
 = ?
 AND produit.type = 'vinyle' AND produit_artiste.id_produit = ? AND produit_artiste.id_artiste = 
artiste.id 
AND produit_tag.id_produit = ? AND produit_tag.id_tag = tag.id";
        $pdo = $this->getPDO()->prepare($sql);
        $pdo->execute([$id, $id, $id]);
        $vinyle = $pdo->fetchAll(PDO::FETCH_ASSOC);
        $theme = [];
        foreach ($vinyle as $v) {
            $theme[] = $v["theme"];
        }
        $theme = implode(" ", $theme);
        $product = call_user_func_array("array_merge", $vinyle);
        $product["theme"] = $theme;
        return $product;
    }

    public function getPlatines()
    {
        $sql = "SELECT produit.*, artiste.nom as auteur, tag.nom as theme FROM produit, artiste, produit_artiste, tag, produit_tag 
WHERE produit.type = 'platine' AND produit_artiste.id_produit = produit.id AND produit_artiste.id_artiste = artiste.id
 AND produit_tag.id_produit = produit.id AND produit_tag.id_tag = tag.id";
        $pdo = $this->getPDO()->prepare($sql);
        $pdo->execute();
        $tousLesPlatines = $pdo->fetchAll(PDO::FETCH_ASSOC);

        $platines = array();
        foreach ($tousLesPlatines as $p) {
            $id = $p['id'];
            if (!isset($platines[$id])) {
                $platines[$id] = $p;
                $platines[$id]['theme'] = array();
            }
            $platines[$id]['theme'][] = $p['theme'];
        }
        $platines = call_user_func("array_merge", $platines);

        $theme = array();
        for ($i = 0; $i < count($platines); $i++) {
            $theme[$i] = implode(" ", $platines[$i]["theme"]);
            $platines[$i]["theme"] = $theme[$i];
        }
        return $platines;
    }

    public function getPlatineById($id)
    {
        $sql = "SELECT produit.*, artiste.nom as auteur, tag.nom as theme FROM produit, produit_artiste, artiste, produit_tag, tag WHERE 
produit.id
 = ?
 AND produit.type = 'platine' AND produit_artiste.id_produit = ? AND produit_artiste.id_artiste = 
artiste.id 
AND produit_tag.id_produit = ? AND produit_tag.id_tag = tag.id";
        $pdo = $this->getPDO()->prepare($sql);
        $pdo->execute([$id, $id, $id]);
        $produit = $pdo->fetchAll(PDO::FETCH_ASSOC);
        $theme = [];
        foreach ($produit as $p) {
            $theme[] = $p["theme"];
        }
        $theme = implode(" ", $theme);
        $product = call_user_func_array("array_merge", $produit);
        $product["theme"] = $theme;
        return $product;
    }

    public function getCoffrets()
    {
        $sql = "SELECT produit.*, artiste.nom as auteur, tag.nom as theme FROM produit, artiste, produit_artiste, tag, produit_tag WHERE produit.type = 'coffret' AND 
produit_artiste.id_produit = produit.id AND produit_artiste.id_artiste = artiste.id AND produit_tag.id_produit = 
produit.id AND produit_tag.id_tag = tag.id";
        $pdo = $this->getPDO()->prepare($sql);
        $pdo->execute();
        $tousLesCoffrest = $pdo->fetchAll(PDO::FETCH_ASSOC);

        $coffrets = array();
        foreach ($tousLesCoffrest as $c) {
            $id = $c['id'];
            if (!isset($coffrets[$id])) {
                $coffrets[$id] = $c;
                $coffrets[$id]['theme'] = array();
            }
            $coffrets[$id]['theme'][] = $c['theme'];
        }
        $coffrets = call_user_func("array_merge", $coffrets);

        $theme = array();
        for ($i = 0; $i < count($coffrets); $i++) {
            $theme[$i] = implode(" ", $coffrets[$i]["theme"]);
            $coffrets[$i]["theme"] = $theme[$i];
        }
        return $coffrets;
    }

    public function getCoffretById($id)
    {
        $sql = "SELECT produit.*, artiste.nom as auteur, tag.nom as theme FROM produit, produit_artiste, artiste, produit_tag, tag WHERE 
produit.id
 = ?
 AND produit.type = 'coffret' AND produit_artiste.id_produit = ? AND produit_artiste.id_artiste = 
artiste.id 
AND produit_tag.id_produit = ? AND produit_tag.id_tag = tag.id";
        $pdo = $this->getPDO()->prepare($sql);
        $pdo->execute([$id, $id, $id]);
        $produit = $pdo->fetchAll(PDO::FETCH_ASSOC);
        $theme = [];
        foreach ($produit as $p) {
            $theme[] = $p["theme"];
        }
        $theme = implode(" ", $theme);
        $product = call_user_func_array("array_merge", $produit);
        $product["theme"] = $theme;
        return $product;
    }

}