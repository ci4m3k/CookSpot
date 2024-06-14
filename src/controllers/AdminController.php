<?php

require_once 'AppController.php';
require_once __DIR__.'/../models/Post.php';
require_once __DIR__.'/../repository/PostRepository.php';
require_once __DIR__.'/../repository/RatingRepository.php';
require_once __DIR__.'/../repository/BookmarkRepository.php';
require_once __DIR__.'/../repository/CategoryRepository.php';

class AdminController extends AppController
{   
    private $message = [];
    private $postRepository;
    private $ratingRepository;
    private $bookmarkRepository;
    private $categoryRepository;

    public function __construct()
    {
        parent::__construct();
        $this->postRepository = new PostRepository();
        $this->ratingRepository = new RatingRepository();
        $this->bookmarkRepository = new BookmarkRepository();
        $this->categoryRepository = new CategoryRepository();
    }

    

    public function dislikedposts() {
        $posts = $this->postRepository->getDislikedPosts();      
        $this -> render('mainpage',['posts' => $posts, 'message' => 'Logged as Admin'] );
    }

    public function deletepost($id_post) {
    if ($this->isGet() && isset($_GET['id'])) {
        $id_post = $_GET['id'];
        $this->postRepository->deletePost($id_post);
        $posts = $this->postRepository->getPosts();
        $this -> render('mainpage',['posts' => $posts, 'message' => "Post id: .$id_post. has been deleted"] );
    }
}

}