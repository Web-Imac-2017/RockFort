<?php

namespace App\Model\Table;

use App\Model\Table;

class Article extends Table {


    private $id;
    private $nom;
    private $contenu;
    private $image;

    protected $table = 'article';

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
    public function getNom()
    {
        return $this->nom;
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
    public function getImage()
    {
        return $this->image;
    }

    /**SETTERS**/

    /**
     * @param mixed $nom
     */
    public function setNom($nom)
    {
        $this->nom = $nom;
    }

    /**
     * @param mixed $contenu
     */
    public function setContenu($contenu)
    {
        $this->contenu = $contenu;
    }

    /**
     * @param mixed $image
     */
    public function setImage($image)
    {
        $this->image = $image;
    }


    public function test(){
       $sql =  "SELECT * FROM $this->table WHERE id = 1";
       $pdo = $this->getPDO();
       $req = $pdo->query($sql);
       $res = $req->fetch(\PDO::FETCH_NUM);
       return $res;
    }

    public function getArticles(){
        $sql =  "SELECT * FROM $this->table";
        $pdo = $this->getPDO();
        $req = $pdo->query($sql);
        $res = $req->fetchAll(\PDO::FETCH_NUM);
        return $res;
    }

    public function getArticleById($id){
        $sql = "SELECT * FROM $this->table WHERE id = ?";
        $pdo = $this->getPDO()->prepare($sql);
        $pdo->execute([$id]);
        $article = $pdo->fetch();
        return $article;
    }

}