<?php

namespace App\Models;

class UserDTO
{
    public int $id;
    public string $username;
    public string $email;

    public function __construct(User $user)
    {
        $this->id = $user->id;
        $this->username = $user->username;
        $this->email = $user->email;
    }

    public function toArray(): array
    {
        return [
            'id' => $this->id,
            'username' => $this->username,
            'email' => $this->email
        ];
    }
}
