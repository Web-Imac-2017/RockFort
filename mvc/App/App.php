<?php

use App\Config;
use App\Model\Database\Database;

class App{

    private static $_instance;
    private $db_instance;

    public static function getInstance(){
        if(is_null(self::$_instance)){
            self::$_instance = new App();
        }
        return self::$_instance;
    }

    public static function load(){
        session_start(); //REGARDE LA !!!!!!!!
        require ROOT . '/App/Autoloader.php';
        App\Autoloader::register();

    }

    public function getDb(){
        $config = Config::getInstance(ROOT . '/config/config.php');
        if (is_null($this->db_instance)) {
            $this->db_instance = new Database($config->get('db_name'), $config->get('db_user'), $config->get('db_pass'), $config->get('db_host'));
        }
        return $this->db_instance;
    }

    public function getTable($name){
        $class = "\\App\\Model\\Table\\" . ucfirst($name);
        return new $class($this->getDb());
    }

}