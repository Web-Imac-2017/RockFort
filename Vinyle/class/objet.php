<?php
    include_once '../connexion/connexion.php';

    abstract class Objet{
        protected $id;

        public function getId(){
        	return $this->id;
        }

        public function setId($id){
        	$this->id = $id;
        }

?>
