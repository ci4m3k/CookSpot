<?php

require_once 'Repository.php';
require_once __DIR__.'/../models/User.php';

class UserRepository extends Repository
{

    public function getUser(string $email): ?User
    {
        $stmt = $this->database->connect()->prepare('
            SELECT * FROM public.users WHERE email = :email
        ');
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->execute();

        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user == false) {
            return null;
        }

        return new User(
            $user['id_user'],
            $user['id_role'],
            $user['email'],
            $user['password'],
            $user['username'],
        );
    }

    public function addUser(User $user)
    {
        $stmt = $this->database->connect()->prepare('
            INSERT INTO users (
            id_user,
            id_role,
            email,
            password,
            username
            )
            VALUES (?, ?, ?, ?, ?)
        ');

        $stmt->execute([
            $user->getIdUser(),
            $user->getIdRole(),
            $user->getEmail(),
            $user->getPassword(),
            $user->getUsername()
        ]);
    }

    public function isEmailUsed(string $email): bool
    {
        $stmt = $this->database->connect()->prepare('
            SELECT * FROM public.users WHERE email = :email
        ');
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->execute();

        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user == false) {
            return false;
        }
        return true;
    }

    public function getUsernameFromId(string $id_user) : string
    {
        $stmt = $this->database->connect()->prepare('
        SELECT * FROM public.users WHERE id_user = :id_user
        ');
        $stmt->bindParam(':id_user', $id_user, PDO::PARAM_STR);
        $stmt->execute();

        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user == false) {
            return 'unknown';
        }
        return $user['username'];
    }
    


}

