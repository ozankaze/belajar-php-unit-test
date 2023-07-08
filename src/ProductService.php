<?php

// 92

namespace Programmerzamannow\BelajarPhpUnitTest;

use Exception;

class ProductService
{
    public function __construct(private ProductRepository $repository)
    {

    }

    public function register(Product $product): Product
    {
        if ($this->repository->findById($product->getId()) != null) 
        {
            throw new \Exception("Product is already exists");
        }

        return $this->repository->save($product);
    }

}