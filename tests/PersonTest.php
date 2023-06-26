<?php

// 53 Test Exception

namespace Programmerzamannow\BelajarPhpUnitTest;

use PHPUnit\Framework\TestCase;

class PersonTest extends TestCase
{

    // 61 Fixture
    private Person $person;

    protected function setUp(): void
    {
        // $this->person = new Person("Seena");
    }

    /**
     * @before
     */
    public function createPerson()
    {
        $this->person = new Person("Seena");
    }
    
    public function testSuccess()
    {
        // $result = new Person("Seena");
        $this->assertEquals("Hello Budi, my name is Seena", $this->person->sayHello("Budi"));
    }

    public function testFailedException()
    {
        $this->expectException(\Exception::class);
        $this->person->sayHello(null);
    }

    // 57 Test Output
    public function testOutput()
    {
        $this->expectOutputString("Good bye Budi");
        $this->person->sayGoodbye("Budi");
    }
}