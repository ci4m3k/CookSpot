<?php


require_once 'src/controllers/DefaultController.php';
require_once 'src/controllers/SecurityController.php';
require_once 'src/controllers/PostController.php';

require 'Routing.php';


$path = trim($_SERVER['REQUEST_URI'], '/');
$path = parse_url( $path, PHP_URL_PATH);




if(isset($_SESSION['user'])){
    Routing::get('mainpage', 'PostController');
    Routing::get('postpage', 'PostController');
    Routing::post('addpost', 'PostController');
    Routing::get('logout','SecurityController');
    Routing::get('myprofile','UserController');
    Routing::post('adddetails','UserController');
    Routing::post('changeusername','UserController');
    Routing::post('changeemail','UserController');
    Routing::post('changepassword','SecurityController');
}


Routing::get('', 'DefaultController');
Routing::get('index', 'DefaultController');
Routing::post('login', 'SecurityController');
Routing::post('createaccount', 'SecurityController');

Routing::run($path);


