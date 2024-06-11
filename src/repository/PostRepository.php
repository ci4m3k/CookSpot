<?php

require_once 'Repository.php';
require_once __DIR__.'/../models/Post.php';

class PostRepository extends Repository
{

    public function getPost(int $id): ?Post
    {
        $stmt = $this->database->connect()->prepare('
            SELECT * FROM public.posts WHERE id = :id_post
        ');
        $stmt->bindParam(':id_post', $id, PDO::PARAM_INT);
        $stmt->execute();

        $post = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($post == false) {
            return null;
        }

        return new Post(
            $post['id_post'],
            $post['id_user_owner'],
            $post['title'],
            $post['description'],
            $post['ingredients'],
            $post['recipe'],
            $post['image'],
            $post['prep_time'],
            $post['difficulty'],
            $post['number_of_servings'],
            $post['created_at'],
            $post['total_score'],
            $post['total_reviews'],
        );
    }

    public function addPost(Post $post): void
    {
        $stmt = $this->database->connect()->prepare('
            INSERT INTO posts (
            id_post,
            id_user_owner,
            title,
            description,
            ingredients,
            recipe,
            image,
            prep_time,
            difficulty,
            number_of_servings,
            created_at,
            total_score,
            total_reviews
            )
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)
        ');

        $stmt->execute([
            $post->getIdPost(),
            $post->getIdUserOwner(), 
            $post->getTitle(),
            $post->getDescription(),
            $post->getIngredients(),
            $post->getRecipe(),
            $post->getImage(),
            $post->getPrepTime(),
            $post->getDifficulty(),
            $post->getNumberOfServings(),
            $post->getCreatedAt(),
            $post->getTotalScore(),
            $post->getTotalReviews(),
        ]);
    }


    public function getPosts(): array

    {

        $result = [];

        $stmt = $this->database->connect()->prepare('

            SELECT * FROM posts;

        ');

        $stmt->execute();

        $posts = $stmt->fetchAll(PDO::FETCH_ASSOC);
        foreach ($posts as $post) {
            $result[] = new Post(
                $post['id_post'],
                $post['id_user_owner'],
                $post['title'],
                $post['description'],
                $post['ingredients'],
                $post['recipe'],
                $post['image'],
                $post['prep_time'],
                $post['difficulty'],
                $post['number_of_servings'],
                $post['created_at'],
                $post['total_score'],
                $post['total_reviews'],
            );

        }
        return $result;

    }

}