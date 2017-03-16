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

     public function setId($id)
    {
        $this->id = $id;
    }

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
        $sql = "SELECT * FROM ( (commande INNER JOIN commande_utilisateur ON commande.id = commande_utilisateur.id_utilisateur) INNER JOIN commande_produit ON commande.id = commande_produit.id_commande ) WHERE commande_utilisateur.id_utilisateur = ?"; 

        $pdo = $this->getPDO()->prepare($sql);
        $pdo->execute();
        $tousLesCommandes = $pdo->fetchAll(PDO::FETCH_ASSOC);
        return $tousLesCommandes;
    }

    public function creerCommande($id_client){
        $sql = "INSERT INTO commande VALUES ('',?,NOW(),'','')";
        $pdo = $this->getPDO()->prepare($sql);
        $pdo->execute($id_client);

        $sql"SELECT MAX(id) FROM commande";
        $requete->execute( array( ) );
        $id = $requete->fetchColumn();
        $this->setIdUtilisateur($id);
    }

    public function ajoutProduit($id_produit, $id_client){

        $sql = "SELECT stock FROM produit WHERE id = ?";
        $pdo = $this->getPDO()->prepare($sql);
        $pdo->execute($id_client);
        $stock = $pdo->fetchColnum(PDO::FETCH_ASSOC);

        if($stock < 1){
            return ;
        }

        $sql = "INSERT INTO commande_produit VALUES ('',?,?)";
        $pdo = $this->getPDO()->prepare($sql);
        $pdo->execute($this->getId(),$id_produit);

        $sql = "INSERT INTO commande_utilisateur VALUES ('',?,?)";
        $pdo = $this->getPDO()->prepare($sql);
        $pdo->execute($this->getId(),$id_client);

        $sql = "SELECT prix FROM produit WHERE id = ?";
        $pdo = $this->getPDO()->prepare($sql);
        $pdo->execute( array( $id_produit) );
        $prix = $pdo ->fetchColumn();

        $sql"SELECT ttc FROM commande WHERE id = ?";
        $pdo = $this->getPDO()->prepare($sql);
        $pdo->execute( array( $this->getId() ) );
        $ttc = $pdo->fetchColumn();

        $sql = "UPDATE commande SET ttc = ? + ? WHERE id = ?";
        $pdo = $this->getPDO()->prepare($sql);
        $pdo->execute( array( $prix, $ttc, $this->getId() ) );

    }

    public function valide(){

    }

}