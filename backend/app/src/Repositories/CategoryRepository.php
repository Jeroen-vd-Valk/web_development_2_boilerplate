<?php

// NOTE: we are using a simplified file based storage for demo purposes
// For your assignment, you should use a database

namespace App\Repositories;

use App\Models\Category;
use App\Utils\JsonStore;

class CategoryRepository implements ICategoryRepository
{
    private JsonStore $store;
    private const DATA_FILE = __DIR__ . '/../data/categories.json';

    public function __construct()
    {
        $this->store = new JsonStore(self::DATA_FILE, Category::class);
    }

    /**
     * @return Category[]
     */
    public function getAll(): array
    {
        return $this->store->getAll();
    }

    public function getById(int $id): ?Category
    {
        return $this->store->getById($id);
    }

    public function create(Category $category): Category
    {
        $this->store->create($category);
        return $category;
    }

    public function update(Category $category): bool
    {
        return $this->store->update($category);
    }

    public function delete(int $id): bool
    {
        return $this->store->delete($id);
    }
}
