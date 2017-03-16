<?php

namespace App\Model\Table;

use App\Model\Table;
use PDO;

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

    public function getArticles(){
        $sql = "SELECT article.id, article.nom as titre, article.date, article.contenu as texte, article.image as imagecover, tag.nom as theme 
FROM 
article, 
article_tag, 
tag 
WHERE article_tag.id_article = article.id AND article_tag.id_tag = tag.id";
        $pdo = $this->getPDO()->prepare($sql);
        $pdo->execute();
        $tousLesArticles = $pdo->fetchAll(PDO::FETCH_ASSOC);

        $articles = array();
        foreach ($tousLesArticles as $a) {
            $id = $a['id'];
            if (!isset($articles[$id])) {
                $articles[$id] = $a;
                $articles[$id]['theme'] = array();
            }
            $articles[$id]['theme'][] = $a['theme'];
        }
        $articles = call_user_func("array_merge", $articles);

        $theme = array();
        for ($i = 0; $i < count($articles); $i++) {
            $theme[$i] = implode(" ", $articles[$i]["theme"]);
            $articles[$i]["theme"] = $theme[$i];
        }
        return $articles;
    }

    public function getArticleById($id){
        $sql = "SELECT article.id, article.nom as titre, article.date, article.contenu as texte, article.image as imagecover, tag.nom as theme  FROM article, article_tag, tag WHERE 
article.id
 = ? AND article_tag.id_article = ? AND article_tag.id_tag = tag.id";
        $pdo = $this->getPDO()->prepare($sql);
        $pdo->execute([$id, $id]);

        $article = $pdo->fetchAll(PDO::FETCH_ASSOC);
        $theme = [];
        foreach ($article as $a) {
            $theme[] = $a["theme"];
        }
        $theme = implode(" ", $theme);
        $article = call_user_func_array("array_merge", $article);
        $article["theme"] = $theme;
        return $article;
    }

}