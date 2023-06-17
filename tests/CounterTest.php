<?php

// 21

namespace Programmerzamannow\BelajarPhpUnitTest;

use PHPUnit\Framework\Assert;
use PHPUnit\Framework\TestCase;

class CounterTest extends TestCase 
{

    public function testCounter()
    {
        $result = new Counter();
        
        // 31

        $result->increment();
        Assert::assertEquals(1, $result->getCounter());

        $result->increment();
        $this->assertEquals(2, $result->getCounter());

        $result->increment();
        self::assertEquals(3, $result->getCounter());
    }

    /**
     * @test
     */
    public function increment()
    {
        $result = new Counter();
        
        // 37

        $result->increment();
        Assert::assertEquals(1, $result->getCounter());
    }

}