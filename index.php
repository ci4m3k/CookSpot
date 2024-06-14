<?php


require_once 'src/controllers/DefaultController.php';
require_once 'src/controllers/SecurityController.php';
require_once 'src/controllers/PostController.php';
require_once 'src/controllers/RatingController.php';
require_once 'src/controllers/BookmarkController.php';
require_once 'src/controllers/CategoryController.php';
require_once 'src/controllers/AdminController.php';

require 'Routing.php';


$path = trim($_SERVER['REQUEST_URI'], '/');
$path = parse_url( $path, PHP_URL_PATH);


function isAdmin() : bool{
    if(!isset($_SESSION['user'])){
        return false;
    }
    $user = unserialize($_SESSION['user']);
    if($user->getIdRole() === 0){
        return true;
    }
    return false;

}


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
    Routing::get('bookmarks','BookmarkController');
    Routing::post('search', 'PostController');
    Routing::get('explore', 'CategoryController');
    Routing::get('categorypage', 'CategoryController');

    Routing::get('like', 'PostController');
    Routing::get('dislike', 'PostController');
    Routing::get('bookmarkpost', 'BookmarkController');

}

if(isAdmin()){
    Routing::get('dislikedposts','AdminController');
    Routing::get('deletepost','AdminController');
}


Routing::get('', 'DefaultController');
Routing::get('index', 'DefaultController');
Routing::post('login', 'SecurityController');
Routing::post('createaccount', 'SecurityController');
Routing::get('error','DefaultController');

Routing::run($path);


