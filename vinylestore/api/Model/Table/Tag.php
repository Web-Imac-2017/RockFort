<?php

namespace App\Model\Table;

use App\Model\Table;

class Tag extends Table {

    private $id;
    private $nom;

    protected $table = 'tag';

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
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * @param mixed $nom
     */
    public function setNom($nom)
    {
        $this->nom = $nom;
    }

}