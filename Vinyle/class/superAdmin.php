<?php
    include_once ('admin.php');


    /******************SUPERADMIN***********************************************/

class superAdmin{
        private $admin;
         private static $instance;
        
        function __construct($identifiant,$mdp,$nom,$prenom,$mail){
            $this->admin = new Admin($identifiant,$mdp,$nom,$prenom,$mail);
            $this->getAdmin()->ajoutBdd();
        }

        function getAdmin(){
            return $this->admin;
        }
        
        function ajoutAdmin($identifiant,$mdp,$nom,$prenom,$mail){
            $admin = new Admin($identifiant,$mdp,$nom,$prenom,$mail);
            $admin->ajoutBdd();
        }

    }
      
?>