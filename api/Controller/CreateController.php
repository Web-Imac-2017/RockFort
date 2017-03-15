<?php

namespace App\Controller;

class CreateController extends AppController
{

    public function __construct()
    {
        $this->loadModel("Utilisateur");
        $this->loadModel("Commentaire");
    }

    public function commandes_add_idproduit_qty($id, $qty)
    { //Créer la commande lors de la validation d’achat, en envoyant l’id du produit, et sa quantité

    }

    public function user_create()
    { //Créer un utilisateur
        $this->Utilisateur->createClient();
    }

    public function addComment()
    {
        $this->Commentaire->addComment();
    }

}