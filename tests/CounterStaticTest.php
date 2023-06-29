<?php

// 

namespace Programmerzamannow\BelajarPhpUnitTest;

use PHPUnit\Framework\TestCase;

class CounterStaticTest extends TestCase
{
    public static Counter $counter;

    public static function setUpBeforeClass(): void
    {
        self::$counter = new Counter();
    }

    public function testFirst()
    {
        self::$counter->increment();
        self::assertEquals(1, self::$counter->getCounter());
    }

    public function testSecound()
    {
        self::$counter->increment();
        self::assertEquals(2, self::$counter->getCounter());
    }

    protected function tearDown(): void
    {
        echo "Unit test selesai"; 
    }
        
}