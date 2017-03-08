<?php

namespace App\Controller;

use App; //pour l'instant, inutile

class AppController extends Controller
{

    protected $template;

    public function __construct()
    {
        $this->viewpath = ROOT . '/App/View/';
    }


}