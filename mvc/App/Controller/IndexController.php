<?php

namespace App\Controller;


class IndexController extends AppController
{

    protected $template = 'default';

    public function __construct()
    {
        $this->Article = \App::getInstance()->getTable("article");
    }

    public function index(){
//        $this->template = 'test';
        $content = "Je suis la homepage";
        $dab = [1, 2, 3];
        $id = 12;
        $test = $this->Article->test();
        $this->render("App.View.pages.index", compact('content', 'dab', 'id', 'test'));
    }

}