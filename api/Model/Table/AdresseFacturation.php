<?php

namespace App\Model\Table;

use App\Model\Table;

class AdresseFacturation extends Table{

    private $id;
    private $id_user;
    private $adresse;
    private $region;
    private $ville;
    private $pays;

    protected $table = "adresse_facturation";

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
    public function getIdUser()
    {
        return $this->id_user;
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
    public function getRegion()
    {
        return $this->region;
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
    public function getPays()
    {
        return $this->pays;
    }

    /**
     * @param mixed $adresse
     */
    public function setAdresse($adresse)
    {
        $this->adresse = $adresse;
    }

    /**
     * @param mixed $pays
     */
    public function setPays($pays)
    {
        $this->pays = $pays;
    }

    /**
     * @param mixed $region
     */
    public function setRegion($region)
    {
        $this->region = $region;
    }

    /**
     * @param mixed $ville
     */
    public function setVille($ville)
    {
        $this->ville = $ville;
    }

    public function updateByUserId($id)
    {
        $sql = "UPDATE $this->table SET adresse = ?, ville = ?, region = ?, pays = ? WHERE id_utilisateur = $id";
        $pdo = $this->getPDO()->prepare($sql);
        $pdo->bindValue(1, $_POST['adresse']);
        $pdo->bindValue(2, $_POST['ville']);
        $pdo->bindValue(3, $_POST['region']);
        $pdo->bindValue(4, $_POST['pays']);
        $pdo->execute();
    }
}