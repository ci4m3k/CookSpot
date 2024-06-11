<?php
class Category
{
    private $id_category;
    private $category_name;
    private $category_desc;

    public function __construct(
        int $id_category,
        string $category_name,
        string $category_desc
    ){
        $this->id_category = $id_category;
        $this->category_name = $category_name;
        $this->category_desc = $category_desc;
    }


    // Getter and Setter for id_category
    public function getIdCategory(): int {
        return $this->id_category;
    }

    public function setIdCategory(int $id_category): void {
        $this->id_category = $id_category;
    }

    // Getter and Setter for category_name
    public function getCategoryName(): string {
        return $this->category_name;
    }

    public function setCategoryName(string $category_name): void {
        $this->category_name = $category_name;
    }

    // Getter and Setter for category_desc
    public function getCategoryDesc(): string {
        return $this->category_desc;
    }

    public function setCategoryDesc(string $category_desc): void {
        $this->category_desc = $category_desc;
    }
}


?>