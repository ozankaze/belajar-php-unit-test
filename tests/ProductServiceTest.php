<?php

// 92 Stub

namespace Programmerzamannow\BelajarPhpUnitTest;

use Exception;
use PHPUnit\Framework\TestCase;

use function PHPUnit\Framework\assertEquals;
use function PHPUnit\Framework\assertSame;

class ProductServiceTest extends TestCase
{
    private ProductRepository $repository;
    private ProductService $service;

    protected function setUp(): void
    {
        $this->repository = $this->createStub(ProductRepository::class);
        $this->service = new ProductService($this->repository);
    }
    
    public function testHub()
    {
        $product = new Product();
        $product->setId("1");

        $this->repository->method("findById")
        ->willReturn($product);

        $result = $this->repository->findById("1");
        self::assertSame($product, $result);
    }

    public function testHubMap()
    {
        $product1 = new Product();
        $product1->setId("1");

        $product2 = new Product();
        $product2->setId("2");

        $map = [
            ["1", $product1],
            ["2", $product2]
        ];

        $this->repository->method("findById")
        ->willReturnMap($map);

        self::assertSame($product1, $this->repository->findById("1"));
        self::assertSame($product2, $this->repository->findById("2"));
    }

    public function testStubCallback()
    {
        $this->repository->method("findByID")
        ->willReturnCallback(function (string $id) {
            $product = new Product();
            $product->setId($id);
            return $product;
        });

        self::assertEquals("1", $this->repository->findById("1")->getId());
        self::assertEquals("2", $this->repository->findById("2")->getId());
        self::assertEquals("3", $this->repository->findById("3")->getId());
    }

    public function testRegister()
    {
        $this->repository->method("findByID")->willReturn(null);
        $this->repository->method("save")->willReturnArgument(0);

        $product = new Product();
        $product->setId("1");
        $product->setName("Contoh");

        $result = $this->service->register($product);

        self::assertEquals($product->getId(), $result->getId());
        self::assertEquals($product->getName(), $result->getName());
    }

    public function testRegisterException()
    {
        $this->expectException(\Exception::class);

        $productInDB = new Product();
        $productInDB->setId("1");

        $this->repository->method("findByID")->willReturn($productInDB);

        $product = new Product();
        $product->setId("1");

        $this->service->register($product);
    }

    // 108 Mock Object
    public function testDelete()
    {
        $product = new Product();
        $product->setId("1");

        $this->repository->method("findById")
        ->willReturn($product);

        $this->service->delete("1");
        self::assertTrue(true, "Success delete");
    }

    public function testDeleteException()
    {
        $this->expectException(\Exception::class);
        $this->repository->method("findById")
        ->willReturn(null);

        $this->service->delete("1");
    }
}