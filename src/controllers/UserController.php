<?php

require_once 'AppController.php';
require_once __DIR__.'/../models/Post.php';
require_once __DIR__.'/../repository/PostRepository.php';
require_once __DIR__.'/../repository/UserRepository.php';
require_once __DIR__.'/../repository/UserDetailsRepository.php';
require_once __DIR__.'/../services/SessionInfo.php';


class UserController extends AppController
{

    private $message = [];
    private $postRepository;
    private $userRepository;
    private $userDetailsRepository;
    private $sessionInfo;

    public function __construct()
    {
        parent::__construct();
        $this->sessionInfo = new SessionInfo();
        $this->postRepository = new PostRepository();
        $this->userRepository = new UserRepository();
        $this->userDetailsRepository = new UserDetailsRepository();
    }



    public function myprofile() 
    {
        $id = $this->sessionInfo->getIdUserFromSession();
        $posts = $this->postRepository->getPostsByIdUserOwner($id);
        $user = $this->userRepository->getUserFromIdUser($id);
        $user_details = $this->userDetailsRepository->getUserDetails($id);
        $this -> render('my-profile',['posts' => $posts, 'user'=>$user, 'userdetails' => $user_details] );
    }

    public function adddetails() 
    {

        if ($this->isPost()) {

            // Generate a unique id for users_details
            $unique_id_users_details = uniqid('', true);
            $id_user = $this->sessionInfo->getIdUserFromSession();

            // Create a new UserDetails object 
            $user_details = new UserDetails(
                $unique_id_users_details,
                $id_user,
                $_POST['first_name'],
                $_POST['last_name'],
                $_POST['city'],
                $_POST['street_name'],
                $_POST['street_address'],
                $_POST['postal_code'],
                $_POST['state'],
                $_POST['country']

            );
            
        
            $has_details = $this-> userDetailsRepository->isUserHasDetails($id_user);
            if(!$has_details){
                // Add the user_details to the database
            $this->userDetailsRepository->addUserDetails($user_details);

            } else {
                var_dump('else');
                $this->userDetailsRepository->updateUserDetails($user_details, $id_user);
            }

            // Render the user_details page with the new user_details data
            return $this->myprofile();
        }


        return $this->render('add-details', ['messages' => $this->message,]);       
    }

    public function changeusername() 
    {

        if ($this->isPost()) {
            $id_user = $this->sessionInfo->getIdUserFromSession();
            $this->userRepository->updateUsername($id_user, $_POST['username']);
            return $this->myprofile();
        }


        return $this->render('change-username', ['messages' => $this->message,]);       
    }

    public function changeemail() 
    {

        if ($this->isPost()) {
            $id_user = $this->sessionInfo->getIdUserFromSession();
            $this->userRepository->updateEmail($id_user, $_POST['email']);
            return $this->myprofile();
        }

        return $this->render('change-email', ['messages' => $this->message,]);       
    }



}


