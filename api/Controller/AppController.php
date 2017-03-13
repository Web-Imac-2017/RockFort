<?php

namespace App\Controller;

use App; //pour l'instant, inutile

class AppController
{

    protected function loadModel($modelname){
        $this->$modelname = App::getInstance()->getTable($modelname);
    }


}