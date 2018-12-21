<?php

use PHPUnit\Framework\TestCase;

class FirstTest extends TestCase
{
    protected $user;

    public function setUp()
    {
        $this->user = new App\Models\User();

    }

    // Test With Anotations

    /** @test */
    public function we_can_get_the_first_name()
    {

        $this->user->setFirstName('John');
        $this->assertEquals($this->user->getFirstName(), 'John');
    }



    public function testWeCanGetTheFirstName()
    {
        $this->user->setFirstName('Murat');
        $this->assertEquals($this->user->getFirstName(), 'Murat');
    }

    public function testWeCanGetTheLastName()
    {
        $this->user->setLastName('Topuz');
        $this->assertEquals($this->user->getLastName(), 'Topuz');
    }

    public function testFirstAndLastNameTrimmed()
    {

        $this->user->setLastName(' Topuz  ');
        $this->user->setFirstName('  Murat  ');
        $this->assertEquals($this->user->getLastName(), 'Topuz');
        $this->assertEquals($this->user->getFirstName(), 'Murat');

    }

    public function testEmailAdressCanBeSet()
    {

        $this->user->setEmailAddress('foo@example.com');
        $this->assertEquals($this->user->getEmailAddress(), 'foo@example.com');
    }

    public function testEmailVeriablesContainCorrect()
    {
        $this->user->setFirstName('john');
        $this->user->setLastName('doe');
        $this->user->setEmailAddress('johndoe@example.com');
        $emailVeriables = $this->user->getEmailVeriables();
        $this->assertArrayHasKey('full_name', $emailVeriables);
        $this->assertArrayHasKey('email', $emailVeriables);
        $this->assertEquals($emailVeriables['full_name'], 'john doe');
        $this->assertEquals($emailVeriables['email'], 'johndoe@example.com');
    }

}