<?php
use PHPUnit\Framework\TestCase;

class UserDetailsTest extends TestCase
{
    private $userDetails;

    protected function setUp(): void
    {
        $this->userDetails = new UserDetails(
            '1',
            '1001',
            'John',
            'Doe',
            'New York',
            '5th Avenue',
            '1234',
            '10001',
            'NY',
            'USA'
        );
    }

    public function testGetIdUsersDetails()
    {
        $this->assertEquals('1', $this->userDetails->getIdUsersDetails());
    }

    public function testSetIdUsersDetails()
    {
        $this->userDetails->setIdUsersDetails('2');
        $this->assertEquals('2', $this->userDetails->getIdUsersDetails());
    }

    public function testGetIdUser()
    {
        $this->assertEquals('1001', $this->userDetails->getIdUser());
    }

    public function testSetIdUser()
    {
        $this->userDetails->setIdUser('1002');
        $this->assertEquals('1002', $this->userDetails->getIdUser());
    }

    public function testGetFirstName()
    {
        $this->assertEquals('John', $this->userDetails->getFirstName());
    }

    public function testSetFirstName()
    {
        $this->userDetails->setFirstName('Jane');
        $this->assertEquals('Jane', $this->userDetails->getFirstName());
    }

    public function testGetLastName()
    {
        $this->assertEquals('Doe', $this->userDetails->getLastName());
    }

    public function testSetLastName()
    {
        $this->userDetails->setLastName('Smith');
        $this->assertEquals('Smith', $this->userDetails->getLastName());
    }

    public function testGetCity()
    {
        $this->assertEquals('New York', $this->userDetails->getCity());
    }

    public function testSetCity()
    {
        $this->userDetails->setCity('Los Angeles');
        $this->assertEquals('Los Angeles', $this->userDetails->getCity());
    }

    public function testGetStreetName()
    {
        $this->assertEquals('5th Avenue', $this->userDetails->getStreetName());
    }

    public function testSetStreetName()
    {
        $this->userDetails->setStreetName('Sunset Blvd');
        $this->assertEquals('Sunset Blvd', $this->userDetails->getStreetName());
    }

    public function testGetStreetAddress()
    {
        $this->assertEquals('1234', $this->userDetails->getStreetAddress());
    }

    public function testSetStreetAddress()
    {
        $this->userDetails->setStreetAddress('5678');
        $this->assertEquals('5678', $this->userDetails->getStreetAddress());
    }

    public function testGetPostalCode()
    {
        $this->assertEquals('10001', $this->userDetails->getPostalCode());
    }

    public function testSetPostalCode()
    {
        $this->userDetails->setPostalCode('90001');
        $this->assertEquals('90001', $this->userDetails->getPostalCode());
    }

    public function testGetState()
    {
        $this->assertEquals('NY', $this->userDetails->getState());
    }

    public function testSetState()
    {
        $this->userDetails->setState('CA');
        $this->assertEquals('CA', $this->userDetails->getState());
    }

    public function testGetCountry()
    {
        $this->assertEquals('USA', $this->userDetails->getCountry());
    }

    public function testSetCountry()
    {
        $this->userDetails->setCountry('Canada');
        $this->assertEquals('Canada', $this->userDetails->getCountry());
    }
}
