<?php

require_once 'Repository.php';
require_once __DIR__.'/../models/Bookmark.php';
require_once __DIR__.'/../models/Post.php';
require_once __DIR__.'/../models/User.php';

class BookmarkRepository extends Repository
{

    public function addBookmark(Bookmark $bookmark): void
    {
        $stmt = $this->database->connect()->prepare('
            INSERT INTO bookmarks (
                id_user,
                id_post
                )
            VALUES (?, ?)
        ');

        $stmt->execute([
            $bookmark->getIdUser(),
            $bookmark->getIdPost()
        ]);
    }

    public function removeBookmark(Bookmark $bookmark): void {
        
        $stmt = $this->database->connect()->prepare('
            DELETE FROM bookmarks
            WHERE 
                id_user = ?
            AND 
                id_post = ?
        ');

        $stmt->execute([
            $bookmark->getIdUser(),
            $bookmark->getIdPost()
        ]);
    }



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

    public function isBookmarkedByUser(string $id_user, string $id_post): bool{
            
            $stmt = $this->database->connect()->prepare('

            SELECT * FROM bookmarks WHERE id_user = :id_user AND id_post = :id_post;

        ');   

        $stmt->bindParam(':id_user', $id_user, PDO::PARAM_INT);
        $stmt->bindParam(':id_post', $id_post, PDO::PARAM_INT);
        $stmt->execute();
        $bookmark = $stmt->fetch(PDO::FETCH_ASSOC);

        if($bookmark == false){
            return false;
        }
        
        return true;

    }



}