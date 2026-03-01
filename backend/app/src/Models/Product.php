<?php

namespace App\Models;

class Product
{
    public ?int $id;
    public string $name;
    public float $price;
    public string $description;
    public int $category_id;
    public ?Category $category;

    public function __construct(array $data = [])
    {
        $this->id = $data['id'] ?? null;
        $this->name = $data['name'] ?? '';
        $this->price = $data['price'] ?? 0.0;
        $this->description = $data['description'] ?? '';
        $this->category_id = $data['category_id'] ?? 0;
        $this->category = isset($data['category']) ? new Category($data['category']) : null;
    }
}
