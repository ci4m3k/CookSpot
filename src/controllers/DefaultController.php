<?php

require_once 'AppController.php';

class DefaultController extends AppController {

    public function index() {
        $this -> render('mainpage');
    }


    public function login() {
        $this -> render('login');

    }

    public function postpage() {
        $this -> render('post-page');

    }

    public function createAccount() {
        $this -> render('createAccount');
    }

}

