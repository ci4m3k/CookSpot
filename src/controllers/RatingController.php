<?php

require_once 'AppController.php';
require_once __DIR__.'/../models/Post.php';
require_once __DIR__.'/../models/Rating.php';
require_once __DIR__.'/../repository/RatingRepository.php';
require_once __DIR__.'/../repository/PostRepository.php';

class RatingController extends AppController{

    private $ratingRepository;
    private $postRepository;

    public function __construct()
    {
        parent::__construct();
        $this->ratingRepository = new RatingRepository();
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

    public function isrsadsada( string $id_post): bool
    {
        $id_user = $this->getIdUserFromSession();
        return $this->ratingRepository->isRatedByUser($id_user, $id_post);
    }
    
    public function israted(string $id_post): void
{
    $id_user = $this->getIdUserFromSession();
    $isRated = $this->ratingRepository->isRatedByUser($id_user, $id_post);

    header('Content-Type: application/json');
    echo json_encode(['rated' => $isRated]);
}
    

}