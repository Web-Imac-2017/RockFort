<?php
define('ROOT', __DIR__);
//define('WEB_ROOT', '/RockFort-Master_v2');
require 'App.php';
App::load();


/****ROUTEUR, route les plus précises en premier (à comprendre celle ayant le plus de "/" ****/

$routeur = new \App\Routeur\Routeur($_GET['url']);


/**READ**/
//$routeur->get('/api/', "Read#index");
$routeur->get('products/:id', "Read#products_id"); //ou ->post
$routeur->get('/products/', "Read#products");
$routeur->get('vinyles/:id', "Read#vinyles_id"); //ou ->post
$routeur->get('vinyles/', "Read#vinyles");
$routeur->get('platines/:id', "Read#platines_id"); //ou ->post
$routeur->get('platines/', "Read#platines");
$routeur->get('coffrets/:id', "Read#coffrets_id"); //ou ->post
$routeur->get('coffrets/', "Read#coffrets");
$routeur->get('articles/:id', "Read#articles_id"); //ou ->post
$routeur->get('articles/', "Read#articles");
$routeur->get('users/:id/infos', "Read#users_id_infos"); //ou ->post
$routeur->get('users/:id/commandes', "Read#users_id_commandes"); //ou ->post

/**Create**/
$routeur->get('commandes/', "Create#commandes_add_idproduct_qty");//ou ->post
$routeur->post('users/create', "Create#user_create");//ou ->post

/**Update**/
$routeur->post('users/:id/update/delivery_address', "Update#user_id_delivery_address_update");//ou ->post
$routeur->post('users/:id/update/facturation_address', "Update#user_id_facturation_address_update");//ou ->post


$routeur->run();