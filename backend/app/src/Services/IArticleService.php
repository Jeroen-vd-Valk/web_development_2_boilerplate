<?php

namespace App\Services;

use App\Models\Article;

interface IArticleService
{
    /**
     * Get all articles with optional pagination
     * @param int|null $page Page number (1-indexed, null for all articles)
     * @return Article[]
     */
    public function getAll(?int $page = null): array;
    public function getById(int $id): ?Article;
    public function create(Article $article): Article;
    public function update(Article $article): bool;
    public function delete(int $id): bool;
}
