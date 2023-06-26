<?php

// 53 Test Exception

namespace Programmerzamannow\BelajarPhpUnitTest;

use PHPUnit\Framework\TestCase;

class PersonTest extends TestCase
{
    public function testSuccess()
    {
        $result = new Person("Seena");
        $this->assertEquals("Hello Budi, my name is Seena", $result->sayHello("Budi"));
    }

    public function testFailedException()
    {
        $result = new Person("Seena");
        $this->expectException(\Exception::class);
        $result->sayHello(null);
    }
}