<?php

namespace App\Services;

use App\Models\Product;
use App\Repositories\IProductRepository;
use App\Repositories\ProductRepository;

class ProductService implements IProductService
{
    private IProductRepository $repository;

    public function __construct()
    {
        $this->repository = new ProductRepository();
    }

    /**
     * @return Product[]
     */
    public function getAll(): array
    {
        return $this->repository->getAll();
    }

    public function getById(int $id): ?Product
    {
        return $this->repository->getById($id);
    }

    public function create(Product $product): Product
    {
        return $this->repository->create($product);
    }

    public function update(Product $product): bool
    {
        return $this->repository->update($product);
    }

    public function delete(int $id): bool
    {
        return $this->repository->delete($id);
    }
}
