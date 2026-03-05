<?php

namespace App\Repositories;

use App\Models\User;

interface IUserRepository
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
