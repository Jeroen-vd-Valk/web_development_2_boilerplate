<?php

namespace App\Services;

use App\Models\Category;
use App\Repositories\ICategoryRepository;
use App\Repositories\CategoryRepository;

class CategoryService implements ICategoryService
{
    private ICategoryRepository $repository;

    public function __construct()
    {
        $this->repository = new CategoryRepository();
    }

    /**
     * @return Category[]
     */
    public function getAll(): array
    {
        return $this->repository->getAll();
    }

    public function getById(int $id): ?Category
    {
        return $this->repository->getById($id);
    }

    public function create(Category $category): Category
    {
        return $this->repository->create($category);
    }

    public function update(Category $category): bool
    {
        return $this->repository->update($category);
    }

    public function delete(int $id): bool
    {
        return $this->repository->delete($id);
    }
}
