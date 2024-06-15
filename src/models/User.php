<?php
class User 
{
    private $id_user;
    private $id_role;
    private $email;
    private $password;
    private $username;

    public function __construct(
        string $id_user,
        int $id_role,
        string $email,
        string $password,
        string $username
        ) {
        $this->id_user = $id_user;
        $this->id_role = $id_role;
        $this->email = $email;
        $this->password = $password;
        $this->username = $username;
    }

    public function getIdUser(): string {
        return $this->id_user;
    }

    public function setIdUser(string $id_user): void {
        $this->id_user = $id_user;
    }

    public function getIdRole(): int {
        return $this->id_role;
    }

    public function setIdRole(int $id_role): void {
        $this->id_role = $id_role;
    }

    public function getEmail(): string {
        return $this->email;
    }

    public function setEmail(string $email): void {
        $this->email = $email;
    }

    public function getPassword(): string {
        return $this->password;
    }

    public function setPassword(string $password): void {
        $this->password = $password;
    }

    public function getUsername(): string {
        return $this->username;
    }

    public function setUsername(string $username): void {
        $this->username = $username;
    }


}
?>
