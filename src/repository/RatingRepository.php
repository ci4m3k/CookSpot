<?php

require_once 'Repository.php';
require_once __DIR__.'/../models/Rating.php';
require_once __DIR__.'/../models/Post.php';
require_once __DIR__.'/../models/User.php';

class RatingRepository extends Repository
{

    public function addRating(Rating $rate)
    {
        $stmt = $this->database->connect()->prepare('
            INSERT INTO rating (
            id_user,
            id_post,
            score
            )
            VALUES (?, ?, ?)
        ');

        $stmt->execute([
            $rate->getIdUser(),
            $rate->getIdPost(),
            $rate->getScore()

        ]);
    }

    public function getUserRatingList(string $id_user): array
    {

        $result = [];

        $stmt = $this->database->connect()->prepare('

            SELECT * FROM rating WHERE id_user = :id_user;

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

    public function isRatedByUser(string $id_user, string $id_post): bool
    {
        $stmt = $this->database->connect()->prepare('

            SELECT * FROM rating WHERE id_user = :id_user AND id_post = :id_post ;

        ');   

        $stmt->bindParam(':id_user', $id_user, PDO::PARAM_INT);
        $stmt->bindParam(':id_post', $id_post, PDO::PARAM_INT);
        $stmt->execute();
        
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($result == false) {
            return false;
        }
        return true;

    }

    public function getRatingScore(string $id_user, string $id_post): int
    {
        $stmt = $this->database->connect()->prepare('

            SELECT * FROM rating WHERE id_user = :id_user AND id_post = :id_post ;

        ');   

        $stmt->bindParam(':id_user', $id_user, PDO::PARAM_INT);
        $stmt->bindParam(':id_post', $id_post, PDO::PARAM_INT);
        $stmt->execute();
        
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        if($result == false){
            return 100;
        }

        return (int)$result['score'];

    }

    public function like(string $id_user, string $id_post): void {
        
        $stmt = $this->database->connect()->prepare('
            UPDATE public.rating
            SET
                score = 1
            WHERE
                id_user = ?
            AND
                id_post = ?
        ');

        $stmt->execute([
            $id_user,
            $id_post
        ]);
    }

    public function dislike(string $id_user, string $id_post): void {
        
        $stmt = $this->database->connect()->prepare('
            UPDATE public.rating
            SET
                score = -1
            WHERE
                id_user = ?
            AND
                id_post = ?
        ');

        $stmt->execute([
            $id_user,
            $id_post
        ]);
    }

    public function undoRating(string $id_user, string $id_post): void {
        
        $stmt = $this->database->connect()->prepare('
            DELETE FROM rating
            WHERE 
                id_user = ?
            AND 
                id_post = ?
        ');

        $stmt->execute([
            $id_user,
            $id_post
        ]);
    }




}