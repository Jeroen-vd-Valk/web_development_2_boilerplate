<?php

namespace App\Repositories;

use App\Models\Category;

interface ICategoryRepository
{
    /**
     * @return Category[]
     */
    public function getAll(): array;
    public function getById(int $id): ?Category;
    public function create(Category $category): Category;
    public function update(Category $category): bool;
    public function delete(int $id): bool;
}
