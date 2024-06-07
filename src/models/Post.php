<?php
class Post
{
    private $title;
    private $description;
    private $ingredients;
    private $recipe;
    private $image;
    private $prep_time;
    private $difficulty;
    private $number_of_servings;
    private $date;


    // Constructor
    public function __construct(string $title, string $description, string $ingredients, string $recipe, 
                                string $image, string $prep_time, string $difficulty, int $number_of_servings)
    {
        date_default_timezone_set('Europe/Warsaw');
        $this->title = $title;
        $this->description = $description;
        $this->ingredients = $ingredients;
        $this->recipe = $recipe;
        $this->image = $image;
        $this->prep_time = $prep_time;
        $this->difficulty = $difficulty;
        $this->number_of_servings = $number_of_servings;
        $this->date = date('d-m-Y');
    }

    // Getter for title
    public function getTitle() :string
    {
        return $this->title;
    }

    // Getter for description
    public function getDescription() :string
    {
        return $this->description;
    }

    // Getter for ingredients
    public function getIngredients() :string
    {
        return $this->ingredients;
    }

    // Getter for recipe
    public function getRecipe() :string
    {
        return $this->recipe;
    }

    // Getter for image
    public function getImage() :string
    {
        return $this->image;
    }

    // Setter for title
    public function setTitle(string $title)
    {
        $this->title = $title;
    }

    // Setter for description
    public function setDescription(string $description)
    {
        $this->description = $description;
    }

    // Setter for ingredients
    public function setIngredients(string $ingredients)
    {
        $this->ingredients = $ingredients;
    }

    // Setter for recipe
    public function setRecipe(string $recipe)
    {
        $this->recipe = $recipe;
    }

    // Setter for image
    public function setImage(string $image)
    {
        $this->image = $image;
    }


    // Getter and Setter for prep_time
    public function getPrepTime():string
    {
        return $this->prep_time;
    }

    public function setPrepTime(string $prep_time)
    {
        $this->prep_time = $prep_time;
    }

    // Getter and Setter for difficulty
    public function getDifficulty():string
    {
        return $this->difficulty;
    }

    public function setDifficulty(string $difficulty)
    {
        $this->difficulty = $difficulty;
    }

    // Getter and Setter for number_of_servings
    public function getNumberOfServings():string
    {
        return $this->number_of_servings;
    }

    public function setNumberOfServings(int $number_of_servings)
    {
        $this->number_of_servings = $number_of_servings;
    }

    // Getter and Setter for date
    public function getDate():string
    {
        return $this->date;
    }

    public function setDate(string $date)
    {
        $this->date = $date;
    }
}

?>
