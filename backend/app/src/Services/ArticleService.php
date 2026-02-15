<?php

namespace App\Services;

use App\Models\Article;
use App\Repositories\IArticleRepository;
use App\Repositories\ArticleRepositoryDb;

class ArticleService implements IArticleService
{
    private IArticleRepository $repository;

    private const ITEMS_PER_PAGE = 10;

    public function __construct()
    {
        $this->repository = new ArticleRepositoryDb();
    }

    /**
     * Get all articles with optional pagination
     * @param int|null $page Page number (1-indexed, null for all articles)
     * @return Article[]
     */
    public function getAll(?int $page = null): array
    {
        // If no page specified, return all articles
        if ($page === null) {
            return $this->repository->getAll();
        }

        // Validate page number
        if ($page < 1) {
            $page = 1;
        }

        // Calculate offset (page 1 = offset 0, page 2 = offset ITEMS_PER_PAGE, etc.)
        $offset = ($page - 1) * self::ITEMS_PER_PAGE;

        return $this->repository->getAll(self::ITEMS_PER_PAGE, $offset);
    }

    public function getById(int $id): ?Article
    {
        return $this->repository->getById($id);
    }

    public function create(Article $article): Article
    {
        return $this->repository->create($article);
    }

    public function update(Article $article): bool
    {
        return $this->repository->update($article);
    }

    public function delete(int $id): bool
    {
        return $this->repository->delete($id);
    }
}