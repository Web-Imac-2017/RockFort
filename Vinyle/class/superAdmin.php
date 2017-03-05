<?php
    include ('admin.php');


    /******************SUPERADMIN***********************************************/

class superAdmin{
        private $admin;

        
        function __construct($identifiant,$mdp,$nom,$prenom,$mail){
            $this->admin = new Admin($identifiant,$mdp,$nom,$prenom,$mail);
        }

        function getAdmin(){
            return $this->admin;
        }
        
        function ajoutAdmin($id,$login,$mdp,$nom,$prenom,$mail){
            $admin = new Admin($identifiant,$mdp,$nom,$prenom,$mail);
            $admin->ajoutBdd();
        }
        
        function suppressionAdmin($id, $admin_list){
            
        }
    }


    
    
?>