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
    public function getEmail() :string
    {
        return $this->email;
    }

    // Getter for password
    public function getPassword() :string
    {
        return $this->password;
    }

    // Getter for username
    public function getUsername() :string
    {
        return $this->username;
    }

    // Setter for email
    public function setEmail(string $email)
    {
        $this->email = $email;
    }

    // Setter for password
    public function setPassword(string $password)
    {
        $this->password = $password;
    }

    // Setter for username
    public function setUsername(string $username)
    {
        $this->username = $username;
    }
}
?>
