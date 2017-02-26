<?php
    include '../class/*';
    include '../connexion/*';
    
    class Commande {
        private $id;
        private $produit_list;
        private $date;
        private $montant;
        
        /*Utilisation du Singleton
         * 
         * Le but du singleton est de créer qu'une unique instance d'un même objet  
         * 
         * Le singleton consiste à mettre le constructeur en privée
         * à créer une variable contenant une instance de l'objet en privée et static 
         *** (static permet d'appeler un attribut ou même une fonction sans créer d'instance de la classe)
         *** (instancier une classe c'est donner des caractéristique à la classe qu'on a défini et déclarer, on instancie à l'aide du constructeur)
         * Avec le constructeur en privé il nous est impossible d'instancier une variable directement
         * C'est pourquoi on créer une methode static (ici getInstance) pour vérifier si une instance de la classe existe déjà et la créer si besoin.
         * ****Rappel: static permet d'appeler un attribut ou même une fonction sans créer d'instance de la classe, on peut donc avoir accès à instance et à getInstance() sans instancier notre classe
         * **** (DAB!) 
         */
        
        private static $instance;
        
        private function __construct($id,$produit_list,$date,$montant){
            this.$id = $id;
            this.$produit_list = $produit_list;
            this.$date = $date;
            this.$montant = $montant;
        }
        
        public static function getInstance(){
            if (self::$instance == null){
                self::$instance = new Commande($produit_list,$date,$montant);
            }
            return self::$instance;
        }
        
        public function ajout($id_produit){
            this.$montant = $montant  ;// + prix du produit (utilisé requete sql)
        }
        
        public function retirer($id_produit) {
            //si l'id est dans $produit list alors rematre dans la base de donnée
        }
    } 
    

