<?php

require_once 'Repository.php';
require_once __DIR__.'/../models/Post.php';
require_once __DIR__.'/../models/Category.php';

class PostRepository extends Repository
{

    public function getPost(string $id_post): ?Post
    {
        $stmt = $this->database->connect()->prepare('
            SELECT * FROM public.posts WHERE id_post = :id_post
        ');
        $stmt->bindParam(':id_post', $id_post, PDO::PARAM_INT);
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

    public function getCategoriesList(): array
    {

        $result = [];

        $stmt = $this->database->connect()->prepare('

            SELECT * FROM categories;

        ');

        $stmt->execute();

        $categories = $stmt->fetchAll(PDO::FETCH_ASSOC);
        foreach ($categories as $category) {
            $result[] = new Category(
                $category['id_category'],
                $category['category_name'],
                $category['category_desc']
            );
        }
        return $result;
    }

    public function addCategories(string $id_post, array $categories): void
    {
        foreach($categories as $id_category):
            $stmt = $this->database->connect()->prepare('
                INSERT INTO post_categories (
                id_post,
                id_category
                )
                VALUES (?, ?)
            ');

            $stmt->execute([
                $id_post,
                $id_category
            ]);
        endforeach;
    }

    public function getPostCategoriesList(string $id_post): array
    {

        $result = [];

        $stmt = $this->database->connect()->prepare('

            SELECT id_category FROM post_categories WHERE id_post = :id_post;

        ');   

        $stmt->bindParam(':id_post', $id_post, PDO::PARAM_INT);
        $stmt->execute();
        $categories_id = $stmt->fetchAll(PDO::FETCH_ASSOC);

        foreach ($categories_id as $id_category) {
            
            $result[] = $this->getCategotyFromCategoryId($id_category['id_category']);
        }
        return $result;
    }

    public function getCategotyFromCategoryId(int $id_category): ?Category
    {
        

        $stmt = $this->database->connect()->prepare('

            SELECT * FROM categories WHERE id_category= :id_category;

        ');

        $stmt->bindParam(':id_category', $id_category, PDO::PARAM_INT);
        $stmt->execute();

        $category = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($category == false) {
            return null;
        }

        return new Category(
            $category['id_category'],
            $category['category_name'],
            $category['category_desc']
        );

    }

    public function getPostsByIdUserOwner(string $id_user_owner): array
    {

        $result = [];

        $stmt = $this->database->connect()->prepare('

            SELECT * FROM posts WHERE id_user_owner = :id_user_owner;

        ');
        
        $stmt->bindParam(':id_user_owner', $id_user_owner, PDO::PARAM_INT);
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
