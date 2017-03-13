<?php

namespace App\Controller;

class UpdateController extends AppController
{

    public function __construct()
    {
        $this->loadModel("AdresseLivraison");
        $this->loadModel("AdresseFacturation");
    }

    public function user_id_delivery_address_update($id){
        //update l'adresse de livraison
        $this->AdresseLivraison->upadteByUserId($id);
    }

    public function user_id_facturation_address_update($id){
        //update l'adresse de facturation
        $this->AdresseFacturation->upadteByUserId($id);
    }

}