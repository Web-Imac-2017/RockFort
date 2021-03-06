<?php

namespace App\Model\Database;

use App\Config;
use \PDO;

class Database
{

    private $db_name;
    private $db_user;
    private $db_pass;
    private $db_host;
    private $pdo;

    public function __construct($db_name, $db_user = 'root', $db_pass = '', $db_host = 'localhost')
    {
        $this->db_name = $db_name;
        $this->db_user = $db_user;
        $this->db_pass = $db_pass;
        $this->db_host = $db_host;
    }

    public function getPDO()
    {
        $config = Config::getInstance(ROOT . '/config/config.php');
        if ($this->pdo === null) {
            $pdo = $this->pdo = new PDO('mysql:dbname='.$config->get('db_name').';host='.$config->get
                ('db_host'), $config->get('db_user'), $config->get('db_pass'), array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
            $this->pdo = $pdo;
        }
        return $this->pdo;
    }


    public function login(){

    }



}