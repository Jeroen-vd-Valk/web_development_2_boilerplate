<?php

namespace App\Controllers;

use App\Models\Article;
use App\Services\IArticleService;
use App\Services\ArticleService;
use App\Framework\Controller;

class ArticleController extends Controller
{
    private IArticleService $articleService;

    public function __construct()
    {
        $this->articleService = new ArticleService();
    }

    public function getAll()
    {
        try {
            $page = null;

            if (isset($_GET['page'])) {
                $page = $_GET['page'];
            }

            $articles = $this->articleService->getAll($page);
            return $this->sendSuccessResponse($articles);
        } catch (\Exception $e) {
            return $this->sendErrorResponse('Internal server error', 500);
        }
    }

    public function get($vars = [])
    {
        try {
            $id = (int)($vars['id'] ?? 0);
            $article = $this->articleService->getById($id);

            if (!isset($article)) {
                return $this->sendErrorResponse('Item not found', 404);
            }

            return $this->sendSuccessResponse($article);
        } catch (\Exception $e) {
            return $this->sendErrorResponse('Internal server error', 500);
        }
    }

    public function create()
    {
        try {
            $article = $this->mapPostDataToClass(Article::class);
            return $this->sendSuccessResponse([], 201);
        } catch (\Exception $e) {
            return $this->sendErrorResponse('Internal server error', 500);
        }
    }

    public function update($vars = []) {}
}
