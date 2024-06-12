<?php

require_once 'AppController.php';
require_once __DIR__.'/../repository/UserRepository.php';
require_once __DIR__.'/../models/User.php';

class SecurityController extends AppController
{

    private $userRepository;

    public function __construct()
    {
        parent::__construct();
        $this->userRepository = new UserRepository();
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


}