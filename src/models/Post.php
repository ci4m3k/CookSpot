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
    

	// "id_post" serial NOT NULL,
	// "id_user_owner" int NOT NULL,
	// "title" varchar(255) NOT NULL,
	// "description" text NOT NULL,
	// "ingredients" text NOT NULL,
	// "recipe" text NOT NULL,
	// "image" varchar(255) NOT NULL,
	// "prep_time" varchar(10) NOT NULL,
	// "difficulty" varchar(10) NOT NULL,
	// "number_of_servings" int NOT NULL,
	// "created_at" varchar(20) NOT NULL,
	// "like" int NOT NULL DEFAULT 0,
	// "dislike" int NOT NULL DEFAULT 0,


    // Constructor
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

    // Getter and Setter for id_post
    public function getIdPost(): string {
        return $this->id_post;
    }

    public function setIdPost(string $id_post): void {
        $this->id_post = $id_post;
    }

    // Getter and Setter for id_user_owner
    public function getIdUserOwner(): string {
        return $this->id_user_owner;
    }

    public function setIdUserOwner(string $id_user_owner): void {
        $this->id_user_owner = $id_user_owner;
    }

    // Getter and Setter for user_owner
    public function getUserOwner(): string {
        return $this->user_owner;
    }

    public function setUserOwner(string $user_owner): void {
        $this->user_owner = $user_owner;
    }

    // Getter and Setter for title
    public function getTitle(): string {
        return $this->title;
    }

    public function setTitle(string $title): void {
        $this->title = $title;
    }

    // Getter and Setter for description
    public function getDescription(): string {
        return $this->description;
    }

    public function setDescription(string $description): void {
        $this->description = $description;
    }

    // Getter and Setter for ingredients
    public function getIngredients(): string {
        return $this->ingredients;
    }

    public function setIngredients(string $ingredients): void {
        $this->ingredients = $ingredients;
    }

    // Getter and Setter for recipe
    public function getRecipe(): string {
        return $this->recipe;
    }

    public function setRecipe(string $recipe): void {
        $this->recipe = $recipe;
    }

    // Getter and Setter for image
    public function getImage(): string {
        return $this->image;
    }

    public function setImage(string $image): void {
        $this->image = $image;
    }

    // Getter and Setter for prep_time
    public function getPrepTime(): string {
        return $this->prep_time;
    }

    public function setPrepTime(string $prep_time): void {
        $this->prep_time = $prep_time;
    }

    // Getter and Setter for difficulty
    public function getDifficulty(): string {
        return $this->difficulty;
    }

    public function setDifficulty(string $difficulty): void {
        $this->difficulty = $difficulty;
    }

    // Getter and Setter for number_of_servings
    public function getNumberOfServings(): int {
        return $this->number_of_servings;
    }

    public function setNumberOfServings(int $number_of_servings): void {
        $this->number_of_servings = $number_of_servings;
    }

    // Getter and Setter for created_at
    public function getCreatedAt(): string {
        return $this->created_at;
    }

    public function setCreatedAt(string $created_at): void {
        $this->created_at = $created_at;
    }

    // Getter and Setter for like
    public function getLike(): int {
        return $this->like;
    }

    public function setLike(int $like): void {
        $this->like = $like;
    }

    // Getter and Setter for dislike
    public function getDislike(): int {
        return $this->dislike;
    }

    public function setDislike(int $dislike): void {
        $this->dislike = $dislike;
    }
}

?>
