<?php

// NOTE: we are using a simplified file based storage for demo purposes
// For your assignment, you should use a database

namespace App\Repositories;

use App\Models\Product;
use App\Utils\JsonStore;

class ProductRepository implements IProductRepository
{
    private JsonStore $store;
    private CategoryRepository $categoryRepository;
    private const DATA_FILE = __DIR__ . '/../data/products.json';

    public function __construct()
    {
        $this->store = new JsonStore(self::DATA_FILE, Product::class);
        $this->categoryRepository = new CategoryRepository();
    }

    /**
     * @return Product[]
     */
    public function getAll(): array
    {
        $products = $this->store->getAll();
        return $this->enrichProductsWithCategories($products);
    }

    public function getById(int $id): ?Product
    {
        $product = $this->store->getById($id);
        if ($product) {
            $products = $this->enrichProductsWithCategories([$product]);
            return $products[0] ?? null;
        }
        return null;
    }

    /**
     * @param Product[] $products
     * @return Product[]
     */
    private function enrichProductsWithCategories(array $products): array
    {
        foreach ($products as $product) {
            if ($product->category_id) {
                $category = $this->categoryRepository->getById($product->category_id);
                if ($category) {
                    $product->category = $category;
                }
            }
        }
        return $products;
    }

    public function create(Product $product): Product
    {
        $this->store->create($product);
        $products = $this->enrichProductsWithCategories([$product]);
        return $products[0] ?? $product;
    }

    public function update(Product $product): bool
    {
        $result = $this->store->update($product);
        if ($result) {
            $this->enrichProductsWithCategories([$product]);
        }
        return $result;
    }

    public function delete(int $id): bool
    {
        return $this->store->delete($id);
    }
}
