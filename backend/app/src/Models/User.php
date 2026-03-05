<?php

namespace App\Models;

class User
{
    public ?int $id;
    public string $username;
    public string $email;
    public string $password;

    public function __construct(array $data = [])
    {
        $this->id = $data['id'] ?? null;
        $this->username = $data['username'] ?? '';
        $this->email = $data['email'] ?? '';
        $this->password = $data['password'] ?? '';
    }
}
