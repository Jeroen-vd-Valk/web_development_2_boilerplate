<?php

namespace App\Controllers;

use App\Models\Category;
use App\Services\ICategoryService;
use App\Services\CategoryService;
use App\Framework\Controller;

class CategoryController extends Controller
{
    private ICategoryService $categoryService;

    public function __construct()
    {
        $this->categoryService = new CategoryService();
    }

    public function getAll()
    {
        try {
            $categories = $this->categoryService->getAll();
            return $this->sendSuccessResponse($categories);
        } catch (\Exception $e) {
            return $this->sendErrorResponse('Internal server error', 500);
        }
    }

    public function get($vars = [])
    {
        try {
            $id = (int)($vars['id'] ?? 0);
            $category = $this->categoryService->getById($id);
            
            if (!$category) {
                return $this->sendErrorResponse('Category not found', 404);
            }
            return $this->sendSuccessResponse($category);
        } catch (\Exception $e) {
            return $this->sendErrorResponse('Internal server error', 500);
        }
    }

    public function create()
    {
        try {
            $category = $this->mapPostDataToClass(Category::class);
            $category = $this->categoryService->create($category);
            return $this->sendSuccessResponse($category, 201);
        } catch (\Exception $e) {
            var_dump($e->getMessage());
            return $this->sendErrorResponse('Internal server error', 500);
        }
    }

    public function update($vars = [])
    {
        try {
            $category = $this->mapPostDataToClass(Category::class);
            $id = (int)($vars['id'] ?? 0);
            $category->id = $id;
            $this->categoryService->update($category);
            return $this->sendSuccessResponse($category);
        } catch (\Exception $e) {
            return $this->sendErrorResponse('Internal server error', 500);
        }
    }

    public function delete($vars = [])
    {
        try {
            $id = (int)($vars['id'] ?? 0);
            $this->categoryService->delete($id);
            return $this->sendSuccessResponse();
        } catch (\Exception $e) {
            return $this->sendErrorResponse('Internal server error', 500);
        }
    }
}
