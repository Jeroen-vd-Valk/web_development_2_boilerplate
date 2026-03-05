<?php

namespace App\Services;

use App\Models\User;

interface IUserService
{
    /**
     * @return User[]
     */
    public function getAll(): array;
    public function getById(int $id): ?User;
    public function getByEmail(string $email): ?User;
    public function create(User $user): User;
    public function update(User $user): bool;
    public function delete(int $id): bool;
}
