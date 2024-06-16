<?php

require_once 'AppController.php';
require_once __DIR__.'/../models/Post.php';

class ErrorController extends AppController
{   
    private static ?ErrorController $instance = null;

    public function error(): void
    {   
        if(isset($_SESSION['user'])){
            $this->render('error');
        }
        $this->redirect('');
    }

    public static function getInstance(): self
    {
        if (self::$instance === null) {
            self::$instance = new self();
        }
        return self::$instance;
    }
}