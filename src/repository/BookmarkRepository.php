<?php

require_once 'Repository.php';
require_once __DIR__.'/../models/Bookmark.php';
require_once __DIR__.'/../models/Post.php';
require_once __DIR__.'/../models/User.php';

class BookmarkRepository extends Repository
{

    public function getUserBookmarksList(string $id_user): array
    {

        $result = [];

        $stmt = $this->database->connect()->prepare('

            SELECT id_post FROM bookmarks WHERE id_user = :id_user;

        ');   

        $stmt->bindParam(':id_user', $id_user, PDO::PARAM_INT);
        $stmt->execute();
        $posts_id = $stmt->fetchAll(PDO::FETCH_ASSOC);

        foreach ($posts_id as $id_post) {

            if ($id_post['id_post'] == false) {
                $result[] = null;
            }
            
            $result[] = $id_post['id_post'];

        }
        return $result;
    }


}