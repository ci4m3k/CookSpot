<?php

require_once 'AppController.php';
require_once __DIR__.'/../models/Post.php';
require_once __DIR__.'/../models/Rating.php';
require_once __DIR__.'/../repository/RatingRepository.php';
require_once __DIR__.'/../repository/PostRepository.php';
require_once __DIR__.'/../services/SessionInfo.php';


class RatingController extends AppController{

    private $ratingRepository;
    private $postRepository;
    private $sessionInfo;

    public function __construct()
    {
        parent::__construct();
        $this->ratingRepository = new RatingRepository();
        $this->postRepository = new PostRepository();
        $this->sessionInfo = new SessionInfo();
    }


    
    public function israted(string $id_post): void
    {
        $id_user = $this->sessionInfo->getIdUserFromSession();
        $isRated = $this->ratingRepository->isRatedByUser($id_user, $id_post);

        header('Content-Type: application/json');
        echo json_encode(['rated' => $isRated]);
    }
    

}