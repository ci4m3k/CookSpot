<?php

class Validator
{


    public function validateEmail(string $email){
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return 'Wrong Email';
        }
        return false;
    }

    public function validatePassword(string $password) {
        $errors = [];
    
        if (strlen($password) < 8) {
            $errors[] = "Password must be at least 8 characters long. ";
        }
    
        if (!preg_match('/[A-Z]/', $password)) {
            $errors[] = "Password must contain at least one uppercase letter. ";
        }
    
        if (!preg_match('/[a-z]/', $password)) {
            $errors[] = "Password must contain at least one lowercase letter. ";
        }
    
        if (!preg_match('/[0-9]/', $password)) {
            $errors[] = "Password must contain at least one digit. ";
        }
    
        if (!preg_match('/[\W_]/', $password)) { 
            $errors[] = "Password must contain at least one special character. ";
        }
    
        if (!empty($errors)) {
            return $errors;
        }
    
        return true;
    }
    
    public function isEmpty(string $input) {
        $trimmedInput = trim($input);
    
        if ($trimmedInput === '') {
            return true;
        } else {
            return false;
        }
    }

}
