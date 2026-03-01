<?php

namespace App\Controllers;

use App\Models\Product;
use App\Services\IProductService;
use App\Services\ProductService;
use App\Framework\Controller;

class ProductController extends Controller
{
    private IProductService $productService;

    public function __construct()
    {
        $this->productService = new ProductService();
    }

    public function getAll()
    {
        try {
            $products = $this->productService->getAll();
            return $this->sendSuccessResponse($products);
        } catch (\Exception $e) {
            return $this->sendErrorResponse('Internal server error', 500);
        }
    }

    public function get($vars = [])
    {
        try {
            $id = (int)($vars['id'] ?? 0);
            $product = $this->productService->getById($id);
            
            if (!$product) {
                return $this->sendErrorResponse('Product not found', 404);
            }
            return $this->sendSuccessResponse($product);
        } catch (\Exception $e) {
            return $this->sendErrorResponse('Internal server error', 500);
        }
    }

    public function create()
    {
        try {
            $product = $this->mapPostDataToClass(Product::class);
            $product = $this->productService->create($product);
            return $this->sendSuccessResponse($product, 201);
        } catch (\Exception $e) {
            var_dump($e->getMessage());
            return $this->sendErrorResponse('Internal server error', 500);
        }
    }

    public function update($vars = [])
    {
        try {
            $product = $this->mapPostDataToClass(Product::class);
            $id = (int)($vars['id'] ?? 0);
            $product->id = $id;
            $this->productService->update($product);
            return $this->sendSuccessResponse($product);
        } catch (\Exception $e) {
            return $this->sendErrorResponse('Internal server error', 500);
        }
    }

    public function delete($vars = [])
    {
        try {
            $id = (int)($vars['id'] ?? 0);
            $this->productService->delete($id);
            return $this->sendSuccessResponse();
        } catch (\Exception $e) {
            return $this->sendErrorResponse('Internal server error', 500);
        }
    }
}
