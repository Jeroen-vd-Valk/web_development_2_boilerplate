<?php

namespace App\Repositories;

use App\Models\Product;

interface IProductRepository
{
    /**
     * @return Product[]
     */
    public function getAll(): array;
    public function getById(int $id): ?Product;
    public function create(Product $product): Product;
    public function update(Product $product): bool;
    public function delete(int $id): bool;
}
