<?php
use PHPUnit\Framework\TestCase;

class RatingTest extends TestCase
{
    private $rating;

    protected function setUp(): void
    {
        $this->rating = new Rating(
            'user123',
            'post456',
            5
        );
    }

    public function testGetIdUser()
    {
        $this->assertEquals('user123', $this->rating->getIdUser());
    }

    public function testSetIdUser()
    {
        $this->rating->setIdUser('user789');
        $this->assertEquals('user789', $this->rating->getIdUser());
    }

    public function testGetIdPost()
    {
        $this->assertEquals('post456', $this->rating->getIdPost());
    }

    public function testSetIdPost()
    {
        $this->rating->setIdPost('post789');
        $this->assertEquals('post789', $this->rating->getIdPost());
    }

    public function testGetScore()
    {
        $this->assertEquals(5, $this->rating->getScore());
    }

    public function testSetScore()
    {
        $this->rating->setScore(3);
        $this->assertEquals(3, $this->rating->getScore());
    }
}
