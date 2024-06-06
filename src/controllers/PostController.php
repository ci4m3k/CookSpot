<?php

require_once 'AppController.php';
require_once __DIR__.'/../models/Post.php';

class PostController extends AppController
{
    const MAX_FILE_SIZE = 1024*1024;
    const SUPPORTED_TYPES = ['image/png', 'image/jpeg'];
    const UPLOAD_DIRECTORY = '/../public/uploads/';
    
    private $message = [];
    public function addpost()
    {   
        if ($this->isPost() && is_uploaded_file($_FILES['image']['tmp_name']) && $this->validate($_FILES['image'])) {
            move_uploaded_file(
                $_FILES['image']['tmp_name'], 
                dirname(__DIR__).self::UPLOAD_DIRECTORY.$_FILES['image']['name']
            );

            //TODO add to database
            $new_post = new Post($_POST['title'], $_POST['description'], $_POST['ingredients'], $_POST['recipe'], $_FILES['image']['name'], 
                                $_POST['prep_time'], $_POST['difficulty'],$_POST['number_of_servings']);

            return $this->render('post-page', ['messages' => $this->message, 'post' => $new_post]);
        }
        return $this->render('add-post', ['messages' => $this->message,]);       
    }


    private function validate(array $file): bool
    {

        if ($file['size'] > self::MAX_FILE_SIZE) {
            $this->message[] = 'File is too large for destination file system.';
            return false;
        }

        if (!isset($file['type']) || !in_array($file['type'], self::SUPPORTED_TYPES)) {
            $this->message[] = 'File type is not supported.';
            return false;
        }
        


        return true;
    }

}