<?php

// 108 Mock Object

namespace Programmerzamannow\BelajarPhpUnitTest;

use PHPUnit\Framework\TestCase;

use function PHPUnit\Framework\assertSame;
use function PHPUnit\Framework\equalTo;
use function PHPUnit\Framework\never;

class ProductServiceMockTest extends TestCase
{
    
    private ProductRepository $repository;
    private ProductService $service;

    protected function setUp(): void
    {
        $this->repository = $this->createMock(ProductRepository::class);
        $this->service = new ProductService($this->repository);
    }

    public function testMock()
    {
        $product = new Product();
        $product->setId("1");

        $this->repository->expects($this->once())
        ->method("findById")
        ->willReturn($product);

        $result = $this->repository->findById("1");
        self::assertSame($product, $result);
    }

    public function testMockDelete()
    {
        $product = new Product();
        $product->setId("1");

        $this->repository->expects($this->once())
        ->method("delete")
        ->with(self::equalTo($product));

        $this->repository->expects($this->once())
        ->method("findById")
        ->with(self::equalTo($product->getId()))
        ->willReturn($product);

        $this->service->delete("1");
        self::assertTrue(true, "Success delete");
    }

    public function testDeleteMockException()
    {
        $this->expectException(\Exception::class);
        $this->repository->expects(self::once())
            ->method("findById")
            ->willReturn(null)
            ->with(self::equalTo("1"));

        $this->service->delete("1");
    }
    
}