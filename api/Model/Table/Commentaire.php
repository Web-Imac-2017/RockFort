<?php

namespace App\Model\Table;

use App\Model\Table;

class Commentaire extends Table
{

    private $id;
    private $contenu;
    private $id_utilisateur;
    private $id_produit;

    protected $table = 'commentaire';

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
    public function getContenu()
    {
        return $this->contenu;
    }

    /**
     * @return mixed
     */
    public function getIdUtilisateur()
    {
        return $this->id_utilisateur;
    }

    /**
     * @return mixed
     */
    public function getIdProduit()
    {
        return $this->id_produit;
    }


    /**SETTERS**/

    /**
     * @param mixed $contenu
     */
    public function setContenu($contenu)
    {
        $this->contenu = $contenu;
    }

    /**
     * @param mixed $id_utilisateur
     */
    public function setIdUtilisateur($id_utilisateur)
    {
        $this->id_utilisateur = $id_utilisateur;
    }

    /**
     * @param mixed $id_produit
     */
    public function setIdProduit($id_produit)
    {
        $this->id_produit = $id_produit;
    }


    public function addComment()
    {
        $sql = "INSERT INTO commentaire(contenu, id_utilisateur, id_produit) VALUES(?, ?, ?)";
        $pdo = $this->getPDO()->prepare($sql);
        $pdo->bindValue(1, $_POST["commentaire"]);
        $pdo->bindValue(2, $_SESSION["id"]);
        $pdo->bindValue(3, $_POST["id_produit"]);
        $pdo->execute();
    }

}