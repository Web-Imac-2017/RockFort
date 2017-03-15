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






    /*public function query($statement, $class_name = null, $one = false)
    {
        $req = $this->getPDO()->query($statement);
        if(
            (strpos($statement, 'UPDATE')) === 0 ||
            (strpos($statement, 'INSERT')) === 0 ||
            (strpos($statement, 'DELETE')) === 0
        ) {
            return $req;
        }
        if($class_name === null){
            $req->setFetchMode(PDO::FETCH_OBJ);
        }else {
            $req->setFetchMode(PDO::FETCH_CLASS, $class_name);
        }
        if ($one) {
            $datas = $req->fetch();
        } else {
            $datas = $req->fetchAll();
        }
        return $datas;
    }

    public function prepare($statement, $arr, $class_name = null, $one = false)
    {
        $req = $this->getPDO()->prepare($statement);
        $res = $req->execute($arr);
        if(
            strpos($statement, 'UPDATE') === 0 ||
            strpos($statement, 'INSERT') === 0 ||
            strpos($statement, 'DELETE') === 0
        ){
            return $res;
        }
        if($class_name === null){
            $req->setFetchMode(PDO::FETCH_OBJ);
        }else {
            $req->setFetchMode(PDO::FETCH_CLASS, $class_name);
        }
        if ($one) {
            $result = $req->fetch();
        } else {
            $result = $req->fetchAll();
        }
        return $result;
    }

    public function lastInsertId(){
        return $this->getPDO()->lastInsertId();
    }*/

}