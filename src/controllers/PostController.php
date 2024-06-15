<?php

require_once 'AppController.php';
require_once __DIR__.'/../models/Post.php';
require_once __DIR__.'/../repository/PostRepository.php';
require_once __DIR__.'/../repository/RatingRepository.php';
require_once __DIR__.'/../repository/BookmarkRepository.php';
require_once __DIR__.'/../repository/CategoryRepository.php';
require_once __DIR__.'/../services/SessionInfo.php';

class PostController extends AppController
{
    const MAX_FILE_SIZE = 1024*1024;
    const SUPPORTED_TYPES = ['image/png', 'image/jpeg'];
    const UPLOAD_DIRECTORY = '/../public/uploads/';
    
    private $message = [];
    private $postRepository;
    private $ratingRepository;
    private $bookmarkRepository;
    private $categoryRepository;
    private $sessionInfo;

    public function __construct()
    {
        parent::__construct();
        $this->postRepository = new PostRepository();
        $this->ratingRepository = new RatingRepository();
        $this->bookmarkRepository = new BookmarkRepository();
        $this->categoryRepository = new CategoryRepository();
        $this->sessionInfo = new SessionInfo();
    }


    public function addPost()
    {   
        $message = [];
        $categories = $this->categoryRepository->getCategoriesList();
        if ($this->isPost() && is_uploaded_file($_FILES['image']['tmp_name']) && $this->validate($_FILES['image'])) {

            $fileExtension = pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);
            
            $uniqueFileName = uniqid('', true) . '.' . $fileExtension;
            
            move_uploaded_file(
                $_FILES['image']['tmp_name'],          
                dirname(__DIR__).self::UPLOAD_DIRECTORY.$uniqueFileName
            );

            $requiredKeys = [
                'title',
                'description',
                'ingredients',
                'recipe',
                'prep_time',
                'difficulty',
                'number_of_servings'
            ];

            $hasNull = false;

            foreach ($requiredKeys as $key) {
                if (!isset($_POST[$key]) || $_POST[$key] === '') {
                    $hasNull = true;
                    $message[] = ($key . " is null");
                }
            }

            if ($hasNull) {
                return $this->render('add-post', ['messages' => $message, 'categories' => $categories]);  
            }


            $uniquePostId = uniqid('', true);

            $id_user_owner = $this->sessionInfo->getIdUserFromSession();
            $user_owner = $this->sessionInfo->getUsernameFromSession();


            date_default_timezone_set('Europe/Warsaw');
            $created_at = date('d-m-Y');

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
            
            $this->postRepository->addPost($new_post);

            $this->categoryRepository->addCategories($new_post->getIdPost(), $_POST['categories']);

            return $this->postpageFromIdPost($new_post->getIdPost());

        }
        return $this->render('add-post', ['messages' => $this->message, 'categories' => $categories]);       
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
            $id_user = $this->sessionInfo->getIdUserFromSession();
            $rate = $this->ratingRepository->getRatingScore($id_user, $id_post);
            $post = $this->postRepository->getPost($id_post);
            $book = $this->bookmarkRepository->isBookmarkedByUser($id_user, $id_post);
            $category = $this->categoryRepository->getPostCategoriesList($id_post);
            if($post == false){
                return $this->render('error');
            }
            return $this->render('post-page', ['messages' => $this->message, 'post' => $post, 'rate' => $rate, 'book' => $book, 'category' => $category]);
            
        }
    }
    
    public function postpageFromIdPost(string $id_post) {          
            $id_user = $this->sessionInfo->getIdUserFromSession();
            $rate = $this->ratingRepository->getRatingScore($id_user, $id_post);
            $post = $this->postRepository->getPost($id_post);
            $book = $this->bookmarkRepository->isBookmarkedByUser($id_user, $id_post);
            $category = $this->categoryRepository->getPostCategoriesList($id_post);
            return $this->render('post-page', ['messages' => $this->message, 'post' => $post, 'rate' => $rate, 'book' => $book, 'category' => $category]);
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

    public function like(string $id_post) {

        $id_user = $this->sessionInfo->getIdUserFromSession();

        if(!$this->ratingRepository->isRatedByUser($id_user, $id_post)){
            $rate = new Rating($id_user, $id_post, 0);
            $this->ratingRepository->addRating($rate);
            var_dump('1if'.!$this->ratingRepository->isRatedByUser($id_user, $id_post));
        }
        
        $score = $this->ratingRepository->getRatingScore($id_user, $id_post);

        if($score == 0)
        {
            $this->ratingRepository->like($id_user, $id_post);
            $this->postRepository->like($id_post);
            var_dump('like');
            http_response_code(200);
        } 
        elseif($score == 1)
        {
            $this->postRepository->unlike($id_post);
            $this->ratingRepository->undoRating($id_user, $id_post);
            var_dump('unlike');
            http_response_code(200);
        } 
        elseif($score == -1)
        {
            $this->postRepository->undislike($id_post);
            $this->postRepository->like($id_post);
            $this->ratingRepository->like($id_user, $id_post);
            var_dump('undislike like');
            http_response_code(200);
        }
        var_dump('end like');

        
    }

    public function dislike(string $id_post) {
        $id_user = $this->sessionInfo->getIdUserFromSession();

        if(!$this->ratingRepository->isRatedByUser($id_user, $id_post)){
            $rate = new Rating($id_user, $id_post, 0);
            $this->ratingRepository->addRating($rate);
            var_dump('1if'.!$this->ratingRepository->isRatedByUser($id_user, $id_post));
        }
        
        $score = $this->ratingRepository->getRatingScore($id_user, $id_post);

        if($score == 0)
        {
            $this->ratingRepository->dislike($id_user, $id_post);
            $this->postRepository->dislike($id_post);
            var_dump('dislike');
            http_response_code(200);
        } 
        elseif($score == -1)
        {
            $this->postRepository->undislike($id_post);
            $this->ratingRepository->undoRating($id_user, $id_post);
            var_dump('undislike');
            http_response_code(200);
        } 
        elseif($score == 1)
        {
            $this->postRepository->dislike($id_post);
            $this->postRepository->unlike($id_post);
            $this->ratingRepository->dislike($id_user, $id_post);
            var_dump('unlike dislike');
            http_response_code(200);
        }
        var_dump('end dislike');

    }

}

