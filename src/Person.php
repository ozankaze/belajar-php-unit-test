<?php

// 53 Test Exception

namespace Programmerzamannow\BelajarPhpUnitTest;

use Exception;

class Person
{
    public function __construct(private string $name)
    {
        $this->name = $name;
    }

    public function sayHello(?string $name)
    {
        if ($name == null) throw new Exception("Name is null");

        return "Hello $name, my name is $this->name";
    }

    // 57 Test Output
    public function sayGoodbye(?string $name)
    {
        echo "Good bye $name";
    }
}