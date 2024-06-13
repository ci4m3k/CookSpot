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

            // Generate a unique id for post
            $uniquePostId = uniqid('', true);

            $id_user_owner = $this->getIdUserFromSession();
            $user_owner = $this->getUsernameFromSession();


            date_default_timezone_set('Europe/Warsaw');
            $created_at = date('d-m-Y');

            // Create a new Post object with the new file name
            $new_post = new Post(
                $uniquePostId,
                $id_user_owner,
                $user_owner,
                $_POST['title'],
                $_POST['description'],
                $_POST['ingredients'],
                $_POST['recipe'],
                $uniqueFileName,
                $_POST['prep_time'],
                $_POST['difficulty'],
                $_POST['number_of_servings'],
                $created_at,
                0,
                0
            );
            
            // Add the post to the database
            $this->postRepository->addPost($new_post);

            $this->postRepository->addCategories($new_post->getIdPost(), $_POST['categories']);

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
        //$this->postRepository->getPostsByTitle("test");
        $this -> render('mainpage',['posts' => $posts] );
    }
    

    public function postpage() {
        if ($this->isGet() && isset($_GET['id'])) {
            $id_post = $_GET['id'];
            $post = $this->postRepository->getPost($id_post);
            return $this->render('post-page', ['messages' => $this->message, 'post' => $post]);
            
            
        } else {
            // Handle the case where 'id' is not present in the URL
            echo "Post ID is not specified.";
            //$this -> render('post-page');
        }
    }
    
    //TODO it propoble should be in different file 
    protected function getIdUserFromSession(): ?string
    {
        if (!isset($_SESSION['user'])) {
            return null;
        }
        return unserialize($_SESSION['user'])->getIdUser();
    }

    protected function getUsernameFromSession(): ?string
    {
        if (!isset($_SESSION['user'])) {
            return null;
        }
        return unserialize($_SESSION['user'])->getUsername();
    }



    public function search()
    {
        $contentType = isset($_SERVER["CONTENT_TYPE"]) ? trim($_SERVER["CONTENT_TYPE"]) : '';

        if ($contentType === "application/json") {
            $content = trim(file_get_contents("php://input"));
            $decoded = json_decode($content, true);

            header('Content-type: application/json');
            http_response_code(200);

            echo json_encode($this->postRepository->getPostsByTitle($decoded['search']));
        }
    }




}

