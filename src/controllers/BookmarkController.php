<?php

require_once 'AppController.php';
require_once __DIR__.'/../models/Post.php';
require_once __DIR__.'/../models/Bookmark.php';
require_once __DIR__.'/../repository/BookmarkRepository.php';
require_once __DIR__.'/../repository/PostRepository.php';

class BookmarkController extends AppController{

    private $bookmarkRepository;
    private $postRepository;

    public function __construct()
    {
        parent::__construct();
        $this->bookmarkRepository = new BookmarkRepository();
        $this->postRepository = new PostRepository();
    }

    //TODO it probable should be in different file 
    protected function getIdUserFromSession(): ?string
    {
        if (!isset($_SESSION['user'])) {
            return null;
        }
        return unserialize($_SESSION['user'])->getIdUser();
    }

    public function bookmarks(){
        $id_user = $this->getIdUserFromSession();
        $posts_id = $this->bookmarkRepository->getUserBookmarksList($id_user);
        $posts = [];
        foreach($posts_id as $id_post){
            $posts[] = $this->postRepository->getPost($id_post);
        }
        $this -> render('bookmarks',['posts' => $posts] );

    }


    public function bookmarkpost(string $id_post) {
        var_dump('bookmarkpost_fun');
        $id_user = $this->getIdUserFromSession();
        $bookmark = new Bookmark($id_user, $id_post);
        if(!$this->bookmarkRepository->isBookmarkedByUser($id_user, $id_post)){
            $this->bookmarkRepository->addBookmark($bookmark);
            var_dump('add book');
        } else {
            $this->bookmarkRepository->removeBookmark($bookmark);
            var_dump('remuve book');
        }
        


        http_response_code(200);
    }

}