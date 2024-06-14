<?php

class SessionInfo {
    
    public function getIdUserFromSession(): ?string
    {
        if (!isset($_SESSION['user'])) {
            return null;
        }
        return unserialize($_SESSION['user'])->getIdUser();
    }


    public function getUsernameFromSession(): ?string
    {
        if (!isset($_SESSION['user'])) {
            return null;
        }
        return unserialize($_SESSION['user'])->getUsername();
    }
    
}
?>