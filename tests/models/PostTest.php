<?php
use PHPUnit\Framework\TestCase;

class PostTest extends TestCase
{
    private $post;

    protected function setUp(): void
    {
        $this->post = new Post(
            'post123',
            'user123',
            'John Doe',
            'Delicious Cake',
            'A very delicious cake recipe.',
            'flour, sugar, eggs',
            'Mix ingredients and bake.',
            'cake.jpg',
            '30 minutes',
            'easy',
            4,
            '2023-06-15',
            100,
            5
        );
    }

    public function testGetIdPost()
    {
        $this->assertEquals('post123', $this->post->getIdPost());
    }

    public function testSetIdPost()
    {
        $this->post->setIdPost('post456');
        $this->assertEquals('post456', $this->post->getIdPost());
    }

    public function testGetIdUserOwner()
    {
        $this->assertEquals('user123', $this->post->getIdUserOwner());
    }

    public function testSetIdUserOwner()
    {
        $this->post->setIdUserOwner('user456');
        $this->assertEquals('user456', $this->post->getIdUserOwner());
    }

    public function testGetUserOwner()
    {
        $this->assertEquals('John Doe', $this->post->getUserOwner());
    }

    public function testSetUserOwner()
    {
        $this->post->setUserOwner('Jane Smith');
        $this->assertEquals('Jane Smith', $this->post->getUserOwner());
    }

    public function testGetTitle()
    {
        $this->assertEquals('Delicious Cake', $this->post->getTitle());
    }

    public function testSetTitle()
    {
        $this->post->setTitle('Amazing Cake');
        $this->assertEquals('Amazing Cake', $this->post->getTitle());
    }

    public function testGetDescription()
    {
        $this->assertEquals('A very delicious cake recipe.', $this->post->getDescription());
    }

    public function testSetDescription()
    {
        $this->post->setDescription('An extremely delicious cake recipe.');
        $this->assertEquals('An extremely delicious cake recipe.', $this->post->getDescription());
    }

    public function testGetIngredients()
    {
        $this->assertEquals('flour, sugar, eggs', $this->post->getIngredients());
    }

    public function testSetIngredients()
    {
        $this->post->setIngredients('flour, sugar, eggs, milk');
        $this->assertEquals('flour, sugar, eggs, milk', $this->post->getIngredients());
    }

    public function testGetRecipe()
    {
        $this->assertEquals('Mix ingredients and bake.', $this->post->getRecipe());
    }

    public function testSetRecipe()
    {
        $this->post->setRecipe('Mix ingredients, bake, and serve.');
        $this->assertEquals('Mix ingredients, bake, and serve.', $this->post->getRecipe());
    }

    public function testGetImage()
    {
        $this->assertEquals('cake.jpg', $this->post->getImage());
    }

    public function testSetImage()
    {
        $this->post->setImage('new_cake.jpg');
        $this->assertEquals('new_cake.jpg', $this->post->getImage());
    }

    public function testGetPrepTime()
    {
        $this->assertEquals('30 minutes', $this->post->getPrepTime());
    }

    public function testSetPrepTime()
    {
        $this->post->setPrepTime('45 minutes');
        $this->assertEquals('45 minutes', $this->post->getPrepTime());
    }

    public function testGetDifficulty()
    {
        $this->assertEquals('easy', $this->post->getDifficulty());
    }

    public function testSetDifficulty()
    {
        $this->post->setDifficulty('medium');
        $this->assertEquals('medium', $this->post->getDifficulty());
    }

    public function testGetNumberOfServings()
    {
        $this->assertEquals(4, $this->post->getNumberOfServings());
    }

    public function testSetNumberOfServings()
    {
        $this->post->setNumberOfServings(6);
        $this->assertEquals(6, $this->post->getNumberOfServings());
    }

    public function testGetCreatedAt()
    {
        $this->assertEquals('2023-06-15', $this->post->getCreatedAt());
    }

    public function testSetCreatedAt()
    {
        $this->post->setCreatedAt('2024-06-15');
        $this->assertEquals('2024-06-15', $this->post->getCreatedAt());
    }

    public function testGetLike()
    {
        $this->assertEquals(100, $this->post->getLike());
    }

    public function testSetLike()
    {
        $this->post->setLike(150);
        $this->assertEquals(150, $this->post->getLike());
    }

    public function testGetDislike()
    {
        $this->assertEquals(5, $this->post->getDislike());
    }

    public function testSetDislike()
    {
        $this->post->setDislike(3);
        $this->assertEquals(3, $this->post->getDislike());
    }
}
