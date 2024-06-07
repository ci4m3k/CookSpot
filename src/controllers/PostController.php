<?php

require_once 'AppController.php';
require_once __DIR__.'/../models/Post.php';
require_once __DIR__.'/../repository/PostRepository.php';

class PostController extends AppController
{
    const MAX_FILE_SIZE = 1024*1024;
    const SUPPORTED_TYPES = ['image/png', 'image/jpeg'];
    const UPLOAD_DIRECTORY = '/../public/uploads/';
    
    private $message = [];
    private $postRepository;

    public function __construct()
    {
        parent::__construct();
        $this->postRepository = new PostRepository();
    }


    public function addPost()
{   
    if ($this->isPost() && is_uploaded_file($_FILES['image']['tmp_name']) && $this->validate($_FILES['image'])) {
        // Get the original file extension
        $fileExtension = pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);
        
        // Generate a unique name for the file
        $uniqueFileName = uniqid('', true) . '.' . $fileExtension;
        
        // Move the uploaded file to the destination directory with the new unique name
        move_uploaded_file(
            $_FILES['image']['tmp_name'],          
            dirname(__DIR__).self::UPLOAD_DIRECTORY.$uniqueFileName
        );

        // Create a new Post object with the new file name
        $new_post = new Post(
            $_POST['title'], 
            $_POST['description'], 
            $_POST['ingredients'], 
            $_POST['recipe'], 
            $uniqueFileName, 
            $_POST['prep_time'], 
            $_POST['difficulty'], 
            $_POST['number_of_servings']
        );
        
        // Add the post to the database
        $this->postRepository->addPost($new_post);

        // Render the post page with the new post data
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


    
    public function mainpage() {
        $posts = $this->postRepository->getPosts();
        $this -> render('mainpage',['posts' => $posts] );
    }


}