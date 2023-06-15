<?php

// 21

namespace Programmerzamannow\BelajarPhpUnitTest;

use PHPUnit\Framework\TestCase;

class CounterTest extends TestCase 
{

    public function testCounter()
    {
        $result = new Counter();
        $result->increment();
        $result->increment();
        echo $result->getCounter() . PHP_EOL;
    }

    public function testOther()
    {
        echo "Hello Kaka :D" . PHP_EOL;
    }

}