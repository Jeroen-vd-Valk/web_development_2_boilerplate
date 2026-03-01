<?php

namespace App\Services;

use App\Models\Category;

interface ICategoryService
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
