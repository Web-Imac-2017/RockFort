<?php

namespace App\Controller;


class PostsController extends AppController
{

    protected $template = 'default';

   /* public function show($slug, $id, $page){
       // echo "Je suis l'article $id Je suis en page" . $_GET["page"];
        echo "Je suis l'article $id Je suis en page" . $page;
    }*/

    public function show($id){
       // echo "Je suis l'article $id Je suis en page" . $_GET["page"];
        echo "Je suis l'article $id";
    }


    public function grostest(){
        $this->render("pages.grostest");
    }

    public function retest(){
        $this->render("pages.test.retest");
    }

}