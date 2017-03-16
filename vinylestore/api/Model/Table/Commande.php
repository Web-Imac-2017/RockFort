<?php

namespace App\Model\Table;

use App\Model\Table;

class Commande extends Table{

    private $id;
    private $numero;
    private $date;
    private $id_utilisateur;
    private $id_panier;
    private $ttc;

    protected $table = 'commande';

    /**GETTERS**/

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
    public function getNumero()
    {
        return $this->numero;
    }

    /**
     * @return mixed
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * @return mixed
     */
    public function getTtc()
    {
        return $this->ttc;
    }

    /**
     * @return mixed
     */
    public function getIdPanier()
    {
        return $this->id_panier;
    }

    /**
     * @return mixed
     */
    public function getIdUtilisateur()
    {
        return $this->id_utilisateur;
    }


    /**SETTERS**/

    /**
     * @param mixed $numero
     */
    public function setNumero($numero)
    {
        $this->numero = $numero;
    }

    /**
     * @param mixed $ttc
     */
    public function setTtc($ttc)
    {
        $this->ttc = $ttc;
    }

    /**
     * @param mixed $date
     */
    public function setDate($date)
    {
        $this->date = $date;
    }

    /**
     * @param mixed $id_panier
     */
    public function setIdPanier($id_panier)
    {
        $this->id_panier = $id_panier;
    }

    /**
     * @param mixed $id_utilisateur
     */
    public function setIdUtilisateur($id_utilisateur)
    {
        $this->id_utilisateur = $id_utilisateur;
    }

    public function getAllCommandesByUserId($user_id)
    {
        $sql = "SELECT * FROM $this->table WHERE "; //ou du LEFT JOIN

    }


}