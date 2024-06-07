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
            $post['title'],
            $post['description'],
            $post['ingredients'],
            $post['recipe'],
            $post['image'],
            $post['prep_time'],
            $post['difficulty'],
            $post['number_of_servings']
        );
    }

    // "id_post" serial NOT NULL,
	// "id_user_owner" int NOT NULL,
	// "title" varchar(255) NOT NULL,
	// "description" text NOT NULL,
	// "ingrediens" text NOT NULL,
	// "recipe" text NOT NULL,
	// "image" varchar(255) NOT NULL,
	// "preparation_time" varchar(20) NOT NULL,
	// "dificulty" int NOT NULL,
	// "servings_number" int NOT NULL,
	// "created_at" varchar(20) NOT NULL,
	// "total_score" int NOT NULL DEFAULT 0,
	// "total_reviews" int NOT NULL DEFAULT 0,

    public function addPost(Post $post): void
    {
        $stmt = $this->database->connect()->prepare('
            INSERT INTO posts (id_user_owner, title, description, ingrediens, recipe, image, preparation_time, dificulty, servings_number, created_at)
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)
        ');

        // TODO: You should get this value from logged user session
        $id_user_owner = 1;

        $stmt->execute([
            $id_user_owner,
            $post->getTitle(),
            $post->getDescription(),
            $post->getIngredients(),
            $post->getRecipe(),
            $post->getImage(),
            $post->getPrepTime(),
            $post->getDifficulty(),
            $post->getNumberOfServings(),
            $post->getDate()
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
                $post['title'],
                $post['description'],
                $post['ingrediens'],
                $post['recipe'],
                $post['image'],
                $post['preparation_time'],
                $post['dificulty'],
                $post['servings_number'],
            );

        }
        return $result;

    }

}
