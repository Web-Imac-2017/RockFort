<?php
    include_once ('admin.php');


    /******************SUPERADMIN***********************************************/

class superAdmin{
        private $admin;
        private static $instance;

        
        function __construct($mdp,$nom,$prenom,$mail){
            $this->admin = new Admin($mdp,$nom,$prenom,$mail);
            $this->getAdmin()->ajoutBdd();
        }

        function getAdmin(){
            return $this->admin;
        }
        
        function ajoutAdmin($mdp,$nom,$prenom,$mail){
            $admin = new Admin($mdp,$nom,$prenom,$mail);
            $admin->ajoutBdd();
        }

    }
      
      
?>