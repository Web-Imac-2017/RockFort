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
        $sql = "SELECT * FROM $this->table";
        $pdo = $this->getPDO()->prepare($sql);
        $pdo->execute();
        $tousLesProduits = $pdo->fetchAll(PDO::FETCH_ASSOC);
        return $tousLesProduits;
    }

    public function getById($id)
    {
        $sql = "SELECT produit.*, artiste.nom as artiste FROM produit, artiste, produit_artiste FROM produit, artiste, produit_artiste WHERE id = ? AND produit_artiste.id_produit = produit.id AND produit_artiste.id_artiste = artiste.id";
        $pdo = $this->getPDO()->prepare($sql);
        $pdo->execute([$id]);
        $produit = $pdo->fetch(PDO::FETCH_ASSOC);
        return $produit;
    }

    public function getVinyles()
    {
        $sql = "SELECT produit.*, artiste.nom as artiste FROM produit, artiste, produit_artiste FROM produit, artiste, produit_artiste WHERE produit.type = 'vinyle' AND produit_artiste.id_produit = produit.id AND produit_artiste.id_artiste = artiste.id";
        $pdo = $this->getPDO()->prepare($sql);
        $pdo->execute();
        $tousLesVinyles = $pdo->fetchAll(PDO::FETCH_ASSOC);
        return $tousLesVinyles;
    }

    public function getVinyleById($id)
    {
        $sql = "SELECT produit.*, artiste.nom as artiste FROM produit, artiste, produit_artiste WHERE produit.type = 'vinyle' AND produit.id = ? AND produit_artiste.id_produit = produit.id AND produit_artiste.id_artiste = artiste.id";
        $pdo = $this->getPDO()->prepare($sql);
        $pdo->execute([$id]);
        $vinyle= $pdo->fetch(PDO::FETCH_ASSOC);
        return $vinyle;
    }

    public function getPlatines()
    {
        $sql = "SELECT produit.*, artiste.nom as artiste FROM produit, artiste, produit_artiste WHERE produit.type = 
'platine' AND produit_artiste.id_produit = produit.id AND produit_artiste.id_artiste = artiste.id";
        $pdo = $this->getPDO()->prepare($sql);
        $pdo->execute();
        $tousLesPlatines = $pdo->fetchAll(PDO::FETCH_ASSOC);
        return $tousLesPlatines;
    }

    public function getPlatineById($id)
    {
        $sql = "SELECT produit.*, artiste.nom as artiste FROM produit, artiste, produit_artiste WHERE produit.type = 'platine' AND produit.id = ? AND produit_artiste.id_produit = produit.id AND produit_artiste.id_artiste = artiste.id";
        $pdo = $this->getPDO()->prepare($sql);
        $pdo->execute([$id]);
        $platine = $pdo->fetch(PDO::FETCH_ASSOC);
        return $platine;
    }

 public function getCoffrets()
    {
        $sql = "SELECT produit.*, artiste.nom as artiste FROM produit, artiste, produit_artiste WHERE produit.type = 'coffret' AND 
produit_artiste.id_produit = produit.id AND produit_artiste.id_artiste = artiste.id";
        $pdo = $this->getPDO()->prepare($sql);
        $pdo->execute();
        $tousLesCoffrest = $pdo->fetchAll(PDO::FETCH_ASSOC);
        return $tousLesCoffrest;
    }

    public function getCoffretById($id)
    {
        $sql = "SELECT produit.*, artiste.nom as artiste FROM produit, artiste, produit_artiste WHERE produit.type = 'coffret' AND produit.id = ? AND produit_artiste.id_produit = produit.id AND produit_artiste.id_artiste = artiste.id";
        $pdo = $this->getPDO()->prepare($sql);
        $pdo->execute([$id]);
        $platine = $pdo->fetch(PDO::FETCH_ASSOC);
        return $platine;
    }

}