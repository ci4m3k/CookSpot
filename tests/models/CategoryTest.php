<?php
use PHPUnit\Framework\TestCase;

class CategoryTest extends TestCase
{
    private $category;

    protected function setUp(): void
    {
        $this->category = new Category(
            1,
            'Desserts',
            'Delicious desserts from around the world.'
        );
    }

    public function testGetIdCategory()
    {
        $this->assertEquals(1, $this->category->getIdCategory());
    }

    public function testSetIdCategory()
    {
        $this->category->setIdCategory(2);
        $this->assertEquals(2, $this->category->getIdCategory());
    }

    public function testGetCategoryName()
    {
        $this->assertEquals('Desserts', $this->category->getCategoryName());
    }

    public function testSetCategoryName()
    {
        $this->category->setCategoryName('Beverages');
        $this->assertEquals('Beverages', $this->category->getCategoryName());
    }

    public function testGetCategoryDesc()
    {
        $this->assertEquals('Delicious desserts from around the world.', $this->category->getCategoryDesc());
    }

    public function testSetCategoryDesc()
    {
        $this->category->setCategoryDesc('Various beverages from different cultures.');
        $this->assertEquals('Various beverages from different cultures.', $this->category->getCategoryDesc());
    }
}
