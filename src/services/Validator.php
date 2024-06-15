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
    
        // Check if password is at least 8 characters long
        if (strlen($password) < 8) {
            $errors[] = "Password must be at least 8 characters long. ";
        }
    
        // Check if password contains at least one uppercase letter
        if (!preg_match('/[A-Z]/', $password)) {
            $errors[] = "Password must contain at least one uppercase letter. ";
        }
    
        // Check if password contains at least one lowercase letter
        if (!preg_match('/[a-z]/', $password)) {
            $errors[] = "Password must contain at least one lowercase letter. ";
        }
    
        // Check if password contains at least one digit
        if (!preg_match('/[0-9]/', $password)) {
            $errors[] = "Password must contain at least one digit. ";
        }
    
        // Check if password contains at least one special character
        if (!preg_match('/[\W_]/', $password)) { // \W matches any non-word character, _ is for underscore
            $errors[] = "Password must contain at least one special character. ";
        }
    
        // Return an array of errors if there are any, or true if the password is valid
        if (!empty($errors)) {
            return $errors;
        }
    
        return true;
    }
    
    public function isEmpty(string $input) {
        // Trim whitespace from the beginning and end of the string
        $trimmedInput = trim($input);
    
        // Check if the trimmed string is empty
        if ($trimmedInput === '') {
            return true;
        } else {
            return false;
        }
    }

}
