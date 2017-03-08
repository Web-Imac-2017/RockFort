<?php
define('ROOT', __DIR__);
define('FULL_PATH', '/projetvinyle_v3.1');
require 'App/App.php';
App::load();


$routeur = new \App\Routeur\Routeur($_GET['url']);


$routeur->get('/', "Index#index"); //ça putain de marche, sa race, j'y crois pas

//->post()uniquement pour genre les formulaires validés

//$routeur->get('/posts', function(){ echo 'Tous les articles'; });
$routeur->get('/article/:slug-:id/:page', "Posts#show")->with('id', '[0-9]+')->with('page', '[0-9]+')->with('slug', '[a-z\-0-9]+');
$routeur->get('/article/:slug-:id', "Posts#show")->with('id', '[0-9]+')->with('slug', '[a-z\-0-9]+');
$routeur->get('/posts/:id', "Posts#show");
$routeur->get('/test/retest', "Posts#retest");


//$routeur->post('/posts/:id', function($id){ echo 'Poster l\'article' . $id . '<pre>' . print_r($_POST, true) .
// '</pre>'; });
$routeur->post('/posts/:id', "Posts#grostest");



$routeur->run();