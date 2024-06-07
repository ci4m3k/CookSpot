<?php


require_once 'src/controllers/DefaultController.php';
require_once 'src/controllers/SecurityController.php';
require_once 'src/controllers/PostController.php';

require 'Routing.php';


$path = trim($_SERVER['REQUEST_URI'], '/');
$path = parse_url( $path, PHP_URL_PATH);

Routing::get('index', 'DefaultController');
Routing::get('mainpage', 'PostController');
Routing::post('login', 'SecurityController');
Routing::get('createaccount', 'DefaultController');
Routing::get('postpage', 'DefaultController');
Routing::post('addpost', 'PostController');

Routing::run($path);


