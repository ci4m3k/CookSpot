<?php
class User 
{
    private $email;
    private $password;
    private $username;

    // Constructor
    public function __construct(string $email, string $password, string $username)
    {
        $this->email = $email;
        $this->password = $password;
        $this->username = $username;
    }

    // Getter for email
    public function getEmail()
    {
        return $this->email;
    }

    // Getter for password
    public function getPassword()
    {
        return $this->password;
    }

    // Getter for username
    public function getUsername()
    {
        return $this->username;
    }

    // Setter for email
    public function setEmail($email)
    {
        $this->email = $email;
    }

    // Setter for password
    public function setPassword($password)
    {
        $this->password = $password;
    }

    // Setter for username
    public function setUsername($username)
    {
        $this->username = $username;
    }
}
?>
