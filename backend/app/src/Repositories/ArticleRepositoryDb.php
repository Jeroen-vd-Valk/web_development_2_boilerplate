<?php

namespace App\Repositories;

use App\Models\Article;
use PDO;
use PDOException;

class ArticleRepositoryDb implements IArticleRepository
{
    private PDO $pdo;
    private const TABLE_NAME = 'articles';

    public function __construct()
    {
        // Database configuration - use environment variables with Docker defaults
        $host = $_ENV['DB_HOST'] ?? 'mysql';
        $dbname = $_ENV['DB_NAME'] ?? 'developmentdb';
        $username = $_ENV['DB_USER'] ?? 'developer';
        $password = $_ENV['DB_PASSWORD'] ?? 'secret123';
        $port = $_ENV['DB_PORT'] ?? '3306';

        $dsn = "mysql:host={$host};port={$port};dbname={$dbname};charset=utf8mb4";

        try {
            $this->pdo = new PDO($dsn, $username, $password, [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                PDO::ATTR_EMULATE_PREPARES => false,
            ]);
        } catch (PDOException $e) {
            throw new \RuntimeException("Database connection failed: " . $e->getMessage());
        }
    }

    /**
     * Get all articles with optional pagination
     * @param int|null $limit Maximum number of articles to return (null for all)
     * @param int|null $offset Number of articles to skip (null for no offset)
     * @return Article[]
     */
    public function getAll(?int $limit = null, ?int $offset = null): array
    {
        try {
            $sql = "SELECT * FROM " . self::TABLE_NAME . " ORDER BY id ASC";
        
            $stmt = $this->pdo->prepare($sql);
                
            $stmt->execute();
            $rows = $stmt->fetchAll();
            
            return array_map(function ($row) {
                return new Article($this->mapRowToArray($row));
            }, $rows);
        } catch (PDOException $e) {
            throw new \RuntimeException("Failed to fetch articles: " . $e->getMessage());
        }
    }

    public function getById(int $id): ?Article
    {
        try {
            $stmt = $this->pdo->prepare("SELECT * FROM " . self::TABLE_NAME . " WHERE id = :id");
            $stmt->execute(['id' => $id]);
            $row = $stmt->fetch();
            
            if (!$row) {
                return null;
            }
            
            return new Article($this->mapRowToArray($row));
        } catch (PDOException $e) {
            throw new \RuntimeException("Failed to fetch article: " . $e->getMessage());
        }
    }

    public function create(Article $article): Article
    {
        try {
            $stmt = $this->pdo->prepare(
                "INSERT INTO " . self::TABLE_NAME . " (title, author, category, published, content) 
                 VALUES (:title, :author, :category, :published, :content)"
            );
            
            $stmt->execute([
                'title' => $article->title,
                'author' => $article->author,
                'category' => $article->category,
                'published' => $article->published,
                'content' => $article->content,
            ]);
            
            $article->id = (int)$this->pdo->lastInsertId();
            return $article;
        } catch (PDOException $e) {
            throw new \RuntimeException("Failed to create article: " . $e->getMessage());
        }
    }

    public function update(Article $article): bool
    {
        if (!$article->id) {
            throw new \InvalidArgumentException("Article ID is required for update");
        }

        try {
            $stmt = $this->pdo->prepare(
                "UPDATE " . self::TABLE_NAME . " 
                 SET title = :title, author = :author, category = :category, 
                     published = :published, content = :content 
                 WHERE id = :id"
            );
            
            $result = $stmt->execute([
                'id' => $article->id,
                'title' => $article->title,
                'author' => $article->author,
                'category' => $article->category,
                'published' => $article->published,
                'content' => $article->content,
            ]);
            
            return $result && $stmt->rowCount() > 0;
        } catch (PDOException $e) {
            throw new \RuntimeException("Failed to update article: " . $e->getMessage());
        }
    }

    public function delete(int $id): bool
    {
        try {
            $stmt = $this->pdo->prepare("DELETE FROM " . self::TABLE_NAME . " WHERE id = :id");
            $stmt->execute(['id' => $id]);
            
            return $stmt->rowCount() > 0;
        } catch (PDOException $e) {
            throw new \RuntimeException("Failed to delete article: " . $e->getMessage());
        }
    }

    /**
     * Map database row to array format expected by Article constructor
     * Converts date fields and ensures proper types
     */
    private function mapRowToArray(array $row): array
    {
        return [
            'id' => (int)$row['id'],
            'title' => $row['title'],
            'author' => $row['author'],
            'category' => $row['category'],
            'published' => $row['published'], // Already a date string from MySQL
            'content' => $row['content'],
        ];
    }
}