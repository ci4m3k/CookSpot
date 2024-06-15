<?php
class Bookmark
{
    private $id_user;
    private $id_post;
    

    public function __construct(
        string $id_user,
        string $id_post
    ){
        $this->id_user = $id_user;
        $this->id_post = $id_post;
    }


    public function getIdPost(): string {
        return $this->id_post;
    }

    public function setIdPost(string $id_post): void {
        $this->id_post = $id_post;
    }

    public function getIdUser(): string {
        return $this->id_user;
    }

    public function setIdUser(string $id_user): void {
        $this->id_user = $id_user;
    }

}


?>