<?php

namespace App\Model\Table;

use App\Model\Table;

class Utilisateur extends Table
{


    private $id;
    private $type;
    private $identifiant;
    private $motDePasse;
    private $nom;
    private $prenom;
    private $adresse;
    private $region;
    private $ville;
    private $pays;

    protected $table = 'utilisateur';

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
    public function getIdentifiant()
    {
        return $this->identifiant;
    }

    /**
     * @param mixed $motDePasse
     */

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
    public function getPrenom()
    {
        return $this->prenom;
    }

    /**
     * @return mixed
     */
    public function getMotDePasse()
    {
        return $this->motDePasse;
    }

    /**
     * @return mixed
     */
    public function getAdresse()
    {
        return $this->adresse;
    }

    /**
     * @return mixed
     */
    public function getVille()
    {
        return $this->ville;
    }

    /**
     * @return mixed
     */
    public function getRegion()
    {
        return $this->region;
    }

    /**
     * @return mixed
     */
    public function getPays()
    {
        return $this->pays;
    }


    /**
     * @param mixed $motDePasse
     */
    public function setMotDePasse($motDePasse)
    {
        $this->motDePasse = $motDePasse;
    }

    /**
     * @param mixed $adresse
     */
    public function setAdresse($adresse)
    {
        $this->adresse = $adresse;
    }

    /**
     * @param mixed $identifiant
     */
    public function setIdentifiant($identifiant)
    {
        $this->identifiant = $identifiant;
    }

    /**
     * @param mixed $pays
     */
    public function setPays($pays)
    {
        $this->pays = $pays;
    }

    /**
     * @param mixed $nom
     */
    public function setNom($nom)
    {
        $this->nom = $nom;
    }

    /**
     * @param mixed $prenom
     */
    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;
    }

    /**
     * @param mixed $region
     */
    public function setRegion($region)
    {
        $this->region = $region;
    }

    /**
     * @param mixed $type
     */
    public function setType($type)
    {
        $this->type = $type;
    }

    /**
     * @param mixed $ville
     */
    public function setVille($ville)
    {
        $this->ville = $ville;
    }

    //A REVOIR
    public function connexion($identifiant, $mdp)
    {
        $sql = "SELECT * FROM $this->table WHERE identifiant = ? AND motDePasse = ?";
        $pdo = $this->getPDO()->prepare($sql);
        $pdo->execute([$identifiant, $mdp]);
        $res = $pdo->fetchAll();
        return $res;
    }

    public function getAllInfosByUserId($id)
    {
        $sql = "SELECT * FROM $this->table WHERE id = ?";
        $pdo = $this->getPDO()->prepare($sql);
        $pdo->execute([$id]);
        $user = $pdo->fetch();
        return $user;
    }

    public function getAllCommandesByUserId($id)
    {
        $sql = "SELECT * FROM $this->table WHERE id = ?";
        $pdo = $this->getPDO()->prepare($sql);
        $pdo->execute([$id]);
        $user = $pdo->fetch();
        return $user;
    }

    public function createClient(){
        $sql = "INSERT INTO utilisateur(type, identifiant, motDePasse, nom, prenom, adresse, ville, region, pays) VALUES(?, ?, ?, ?, 
?, ?, ?, ?, ?)";
        $pdo = $this->getPDO()->prepare($sql);
        $pdo->bindValue(1, 'client');
        $pdo->bindValue(2, $_POST['identifiant']);
        $pdo->bindValue(3, sha1($_POST['motDePasse']));
        $pdo->bindValue(4, $_POST['nom']);
        $pdo->bindValue(5, $_POST['prenom']);
        $pdo->bindValue(6, $_POST['adresse']);
        $pdo->bindValue(7, $_POST['ville']);
        $pdo->bindValue(8, $_POST['region']);
        $pdo->bindValue(9, $_POST['pays']);
        $pdo->execute();
    }


}