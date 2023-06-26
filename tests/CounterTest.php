<?php

// 21

namespace Programmerzamannow\BelajarPhpUnitTest;

use PHPUnit\Framework\Assert;
use PHPUnit\Framework\TestCase;

class CounterTest extends TestCase 
{

    // 61 Fixture
    private Counter $counter;

    protected function setUp(): void
    {
        $this->counter = new Counter();
        echo "Membuat Counter" . PHP_EOL;         
    }
    

    public function testCounter()
    {
        // 31

        $this->counter->increment();
        Assert::assertEquals(1, $this->counter->getCounter());

        $this->counter->increment();
        $this->assertEquals(2, $this->counter->getCounter());

        $this->counter->increment();
        self::assertEquals(3, $this->counter->getCounter());
    }

    /**
     * @test
     */
    public function increment()
    {
        // 37

        $this->counter->increment();
        Assert::assertEquals(1, $this->counter->getCounter());
    }

    // 41
    public function testFirst(): Counter
    {

        $this->counter->increment();
        $this->assertEquals(1, $this->counter->getCounter());

        return $this->counter;
    }

    /**
     * @depends testFirst
     */
    public function testSecond(Counter $counter)
    {
        $counter->increment();
        $this->assertEquals(2, $counter->getCounter());
    }

     // 61 Fixture
    protected function tearDown(): void
    {
        echo "Tear down" . PHP_EOL;
    }

    /**
     * @after
     */
    protected function after(): void
    {
        echo "After" . PHP_EOL;
    }

}