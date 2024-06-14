<?php

require_once 'AppController.php';
require_once __DIR__.'/../repository/UserRepository.php';
require_once __DIR__.'/../models/User.php';
require_once __DIR__.'/../services/SessionInfo.php';

class SecurityController extends AppController
{

    private $userRepository;
    private $sessionInfo;

    public function __construct()
    {
        parent::__construct();
        $this->userRepository = new UserRepository();
        $this->sessionInfo = new SessionInfo();
    }


    public function login()
    {   

        if (!$this->isPost()) {
            return $this->render('login');
        }

        $email = $_POST['email'];
        $password = $_POST['password'];

        $user = $this->userRepository->getUser($email);

        if (!$user) {
            return $this->render('login', ['messages' => ['User not found!']]);
        }

        if ($user->getEmail() !== $email) {
            return $this->render('login', ['messages' => ['User with this email not exist!']]);
        }

        //var_dump(!password_verify($password, $user->getPassword()));
        if (!password_verify($password, $user->getPassword())) {
            return $this->render('login', ['messages' => ['Wrong password!']]);
        }

        $_SESSION['user'] = serialize($user);

        $this->redirect('mainpage');
    }

    public function createAccount()
    {
        if (!$this->isPost()) {
            return $this->render('createaccount');
        }

        $username = $_POST['username'];
        $email = $_POST['email'];
        $password =$_POST['password'];
        $conf_password = $_POST['conf_password'];

        if ($this->userRepository->isEmailUsed($email)){
            return $this->render('createaccount', ['messages' => ['This email is already taken']]);
        }

        if ($password !== $conf_password) {
            return $this->render('createaccount', ['messages' => ['Please provide proper password']]);
        }

        // Generate a unique id for post
        $uniqueUserId = uniqid('', true);

        $user = new User($uniqueUserId, 1, $email, password_hash($password, PASSWORD_DEFAULT), $username);

        $this->userRepository->addUser($user);

        return $this->render('login', ['messages' => ['You\'ve been succesfully registrated!']]);
    }

    public function logout(): void
    {
        session_unset();
        session_destroy();
        $this->redirect('');
    }

    public function changepassword()
    {
        if (!$this->isPost()) {
            return $this->render('change-password');
        }

        $user = $this->userRepository->getUserFromIdUser($this->sessionInfo->getIdUserFromSession());

        
        $password =$_POST['password'];
        $new_password =$_POST['new_password'];
        $conf_password = $_POST['conf_password'];


        if (!password_verify($password, $user->getPassword())) {
            return $this->render('change-password', ['messages' => ['Wrong password!']]);
        }
       
        if ($new_password !== $conf_password) {
            return $this->render('change-password', ['messages' => ["Your conformation password dosen't match your new password"]]);
        }

        $this->userRepository->updateUserPassword($user->getIdUser(), password_hash($new_password, PASSWORD_DEFAULT));
        //var_dump($user->getIdUser(), password_hash($password, PASSWORD_DEFAULT));

        return $this->render('login', ['messages' => ['Your password got succesfully changed! ']]);
    }




}