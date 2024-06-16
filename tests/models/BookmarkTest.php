<?php
use PHPUnit\Framework\TestCase;

class BookmarkTest extends TestCase
{
    private $bookmark;

    protected function setUp(): void
    {
        $this->bookmark = new Bookmark(
            'user123',
            'post456'
        );
    }

    public function testGetIdUser()
    {
        $this->assertEquals('user123', $this->bookmark->getIdUser());
    }

    public function testSetIdUser()
    {
        $this->bookmark->setIdUser('user789');
        $this->assertEquals('user789', $this->bookmark->getIdUser());
    }

    public function testGetIdPost()
    {
        $this->assertEquals('post456', $this->bookmark->getIdPost());
    }

    public function testSetIdPost()
    {
        $this->bookmark->setIdPost('post789');
        $this->assertEquals('post789', $this->bookmark->getIdPost());
    }
}
