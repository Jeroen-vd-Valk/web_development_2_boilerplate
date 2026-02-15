<?php

// NOTE: we are using a simplified file based storage for demo purposes
// For your assignment, you should use a database

namespace App\Repositories;

use App\Models\Article;
use App\Utils\JsonStore;

class ArticleRepositoryJson implements IArticleRepository
{
    private JsonStore $store;
    private const DATA_FILE = __DIR__ . '/../data/articles.json';

    public function __construct()
    {
        $this->store = new JsonStore(self::DATA_FILE, Article::class);
    }

    /**
     * Get all articles with optional pagination
     * @param int|null $limit Maximum number of articles to return (null for all)
     * @param int|null $offset Number of articles to skip (null for no offset)
     * @return Article[]
     */
    public function getAll(?int $limit = null, ?int $offset = null): array
    {
        $allArticles = $this->store->getAll();
        
        // If no pagination parameters provided, return all
        if ($limit === null && $offset === null) {
            return $allArticles;
        }
        
        // Apply offset
        if ($offset !== null && $offset > 0) {
            $allArticles = array_slice($allArticles, $offset);
        }
        
        // Apply limit
        if ($limit !== null && $limit > 0) {
            $allArticles = array_slice($allArticles, 0, $limit);
        }
        
        return $allArticles;
    }

    public function getById(int $id): ?Article
    {
        return $this->store->getById($id);
    }

    public function create(Article $article): Article
    {
        $this->store->create($article);
        return $article;
    }

    public function update(Article $article): bool
    {
        return $this->store->update($article);
    }

    public function delete(int $id): bool
    {
        return $this->store->delete($id);
    }
}