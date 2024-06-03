<?php
class Post
{
    private $title;
    private $description;
    private $ingredients;
    private $recipe;
    private $image;

    // Constructor
    public function __construct(string $title, string $description, string $ingredients, string $recipe, string $image)
    {
        $this->title = $title;
        $this->description = $description;
        $this->ingredients = $ingredients;
        $this->recipe = $recipe;
        $this->image = $image;
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
}
?>
