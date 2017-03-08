<?php

namespace App\Model;

use App\Model\Database\Database;

class Table extends Database
{
    public function __construct(Database $db)
    {
        $this->db = $db;
        if (is_null($this->table)) {
            $parts = explode("\\", get_class($this));
            $class = end($parts);
//            $this->table = strtolower(str_replace("TableFactory", "", $class));
            $this->table = $class;
        }
    }

}