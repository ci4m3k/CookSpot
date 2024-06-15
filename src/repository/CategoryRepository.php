<?php


require_once 'Repository.php';
require_once __DIR__.'/../models/Category.php';
require_once __DIR__.'/../models/Post.php';
require_once __DIR__.'/../models/User.php';

class CategoryRepository extends Repository
{
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

    public function getPostsListFromIdCategory($id_category){
        $stmt = $this->database->connect()->prepare('

        SELECT * FROM post_categories WHERE id_category= :id_category;

        ');

        $stmt->bindParam(':id_category', $id_category, PDO::PARAM_INT);
        $stmt->execute();

        $categories = $stmt->fetchAll(PDO::FETCH_ASSOC);

        if ($categories == false) {
            return null;
        }

     
        foreach ($categories as $category) {
            $result[] = $category['id_post'];
        }
        return $result;

    }

}
