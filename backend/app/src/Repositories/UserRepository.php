<?php

// NOTE: we are using a simplified file based storage for demo purposes
// For your assignment, you should use a database

namespace App\Repositories;

use App\Models\User;
use App\Utils\JsonStore;

class UserRepository implements IUserRepository
{
    private JsonStore $store;
    private const DATA_FILE = __DIR__ . '/../data/users.json';

    public function __construct()
    {
        $this->store = new JsonStore(self::DATA_FILE, User::class);
    }

    /**
     * @return User[]
     */
    public function getAll(): array
    {
        return $this->store->getAll();
    }

    public function getById(int $id): ?User
    {
        return $this->store->getById($id);
    }

    public function getByEmail(string $email): ?User
    {
        // Note: this is an inefficient query, this is only for demonstration purposes
        $users = $this->store->getAll();
        foreach ($users as $user) {
            if ($user->email === $email) {
                return $user;
            }
        }
        return null;
    }

    public function create(User $user): User
    {
        $this->store->create($user);
        return $user;
    }

    public function update(User $user): bool
    {
        return $this->store->update($user);
    }

    public function delete(int $id): bool
    {
        return $this->store->delete($id);
    }
}
