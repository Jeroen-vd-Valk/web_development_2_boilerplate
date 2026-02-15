<?php

namespace App\Repositories;

use App\Models\Article;

interface IArticleRepository
{
    /**
     * Get all articles with optional pagination
     * @param int|null $limit Maximum number of articles to return (null for all)
     * @param int|null $offset Number of articles to skip (null for no offset)
     * @return Article[]
     */
    public function getAll(?int $limit = null, ?int $offset = null): array;
    public function getById(int $id): ?Article;
    public function create(Article $article): Article;
    public function update(Article $article): bool;
    public function delete(int $id): bool;
}
