<?php
    include '../class/*';
    include '../connexion/*';

    class superAdmin{
        private $admin;
        
        function __construct($id,$login,$mdp,$nom,$prenom,$mail){
            this.$admin = new Admin($id,$login,$mdp,$nom,$prenom,$mail);
        }
        
        function ajoutAdmin($id,$login,$mdp,$nom,$prenom,$mail){
            $admin = new Admin($id,$login,$mdp,$nom,$prenom,$mail);
            //rajout base de donnée
        }
        
        function suppressionAdmin($id, $admin_list){
            
        }
    }