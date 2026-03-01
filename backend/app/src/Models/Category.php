<?php

namespace App\Models;

class Category
{
    public ?int $id;
    public string $name;
    public string $description;

    public function __construct(array $data = [])
    {
        $this->id = $data['id'] ?? null;
        $this->name = $data['name'] ?? '';
        $this->description = $data['description'] ?? '';
    }
}
