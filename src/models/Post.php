<?php
class Post
{

    private $id_post;
    private $id_user_owner;
    private $user_owner;
    private $title;
    private $description;
    private $ingredients;
    private $recipe;
    private $image;
    private $prep_time;
    private $difficulty;
    private $number_of_servings;
    private $created_at;
    private $like;
    private $dislike;
    

    public function __construct(
        string $id_post,
        string $id_user_owner,
        string $user_owner,
        string $title,
        string $description,
        string $ingredients,
        string $recipe, 
        string $image,
        string $prep_time,
        string $difficulty,
        int $number_of_servings,
        string $created_at,
        int $like,
        int $dislike
        ) {
        $this->id_post = $id_post;
        $this->id_user_owner = $id_user_owner;
        $this->user_owner = $user_owner;
        $this->title = $title;
        $this->description = $description;
        $this->ingredients = $ingredients;
        $this->recipe = $recipe;
        $this->image = $image;
        $this->prep_time = $prep_time;
        $this->difficulty = $difficulty;
        $this->number_of_servings = $number_of_servings;
        $this->created_at = $created_at;
        $this->like = $like;
        $this->dislike = $dislike;
    }

    public function getIdPost(): string {
        return $this->id_post;
    }

    public function setIdPost(string $id_post): void {
        $this->id_post = $id_post;
    }

    public function getIdUserOwner(): string {
        return $this->id_user_owner;
    }

    public function setIdUserOwner(string $id_user_owner): void {
        $this->id_user_owner = $id_user_owner;
    }

    public function getUserOwner(): string {
        return $this->user_owner;
    }

    public function setUserOwner(string $user_owner): void {
        $this->user_owner = $user_owner;
    }


    public function getTitle(): string {
        return $this->title;
    }

    public function setTitle(string $title): void {
        $this->title = $title;
    }

 
    public function getDescription(): string {
        return $this->description;
    }

    public function setDescription(string $description): void {
        $this->description = $description;
    }

    public function getIngredients(): string {
        return $this->ingredients;
    }

    public function setIngredients(string $ingredients): void {
        $this->ingredients = $ingredients;
    }

    public function getRecipe(): string {
        return $this->recipe;
    }

    public function setRecipe(string $recipe): void {
        $this->recipe = $recipe;
    }

    public function getImage(): string {
        return $this->image;
    }

    public function setImage(string $image): void {
        $this->image = $image;
    }

    public function getPrepTime(): string {
        return $this->prep_time;
    }

    public function setPrepTime(string $prep_time): void {
        $this->prep_time = $prep_time;
    }

    public function getDifficulty(): string {
        return $this->difficulty;
    }

    public function setDifficulty(string $difficulty): void {
        $this->difficulty = $difficulty;
    }

    public function getNumberOfServings(): int {
        return $this->number_of_servings;
    }

    public function setNumberOfServings(int $number_of_servings): void {
        $this->number_of_servings = $number_of_servings;
    }

    public function getCreatedAt(): string {
        return $this->created_at;
    }

    public function setCreatedAt(string $created_at): void {
        $this->created_at = $created_at;
    }

    public function getLike(): int {
        return $this->like;
    }

    public function setLike(int $like): void {
        $this->like = $like;
    }

    public function getDislike(): int {
        return $this->dislike;
    }

    public function setDislike(int $dislike): void {
        $this->dislike = $dislike;
    }
}

?>
