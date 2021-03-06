<?php

namespace App\Controller;

class ReadController extends AppController {


    public function __construct()
    {
        $this->loadModel("Article");
        $this->loadModel("Commande");
        $this->loadModel("Produit");
        $this->loadModel("Utilisateur");
    }

    public function products(){
        //Récupérer tous les produits + artistes
        $products = $this->Produit->getAll();
        echo json_encode($products);
    }

    public function products_id($id){
        //Récupérer un produit selon id + son artiste
        $produit = $this->Produit->getById($id);
        echo json_encode($produit);
    }

    public function vinyles(){
        $vinyles = $this->Produit->getVinyles();
        echo json_encode($vinyles);
    }

    public function vinyles_id($id){
        $vinyle = $this->Produit->getVinyleById($id);
        echo json_encode($vinyle);
    }

    public function platines(){
        $platines = $this->Produit->getPlatines();
        echo json_encode($platines);
    }

    public function platines_id($id){
        $platine = $this->Produit->getPlatineById($id);
        echo json_encode($platine);
    }

    public function coffrets(){
        $coffrets = $this->Produit->getCoffrets();
        echo json_encode($coffrets);
    }

    public function coffrets_id($id){
        $coffret = $this->Produit->getCoffretById($id);
        echo json_encode($coffret);
    }

    public function articles(){
        $articles = $this->Article->getArticles();
        echo json_encode($articles);
    }

    public function articles_id($id){
        $article = $this->Article->getArticleById($id);
        echo json_encode($article);
    }

    public function users_id_commandes($user_id){
        $commandes = $this->Commande->getAllCommandesByUserId($user_id);
        echo json_encode($commandes);
    }

    public function users_id_infos($user_id){
        $infos = $this->Utilisateur->getAllInfosByUserId($user_id);
        echo json_encode($infos);
    }

}