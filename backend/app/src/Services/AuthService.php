<?php

namespace App\Services;

use App\Models\User;
use App\Exceptions\UserAlreadyExistsException;
use App\Repositories\IUserRepository;
use App\Repositories\UserRepository;
use Firebase\JWT\JWT;
use Firebase\JWT\Key;
use App\Config;

class AuthService implements IAuthService
{
    private const JWT_ALGORITHM = 'HS256';
    
    private IUserRepository $userRepository;

    public function __construct()
    {
        $this->userRepository = new UserRepository();
    }

    public function authenticate(string $email, string $password): ?User
    {
        $user = $this->userRepository->getByEmail($email);

        if (!$user) {
            return null;
        }

        // Verify password against hash
        if (!password_verify($password, $user->password)) {
            return null;
        }

        return $user;
    }

    public function generateToken(User $user): string
    {
        $payload = [
            'id' => $user->id,
            'email' => $user->email,
            'username' => $user->username
        ];
        return JWT::encode($payload, Config::$secretKey, self::JWT_ALGORITHM);
    }

    public function getUserFromToken(string $token): ?User
    {
        try { 
            $decoded = JWT::decode($token, new Key(Config::$secretKey, self::JWT_ALGORITHM));
        } catch (\Exception $e) {
            return null; // Invalid token
        }

        // Get user by ID from the decoded token
        if (isset($decoded->id)) {
            return $this->userRepository->getById($decoded->id);
        }

        return null;        
    }

    public function register(User $user): User
    {
        // Hash password before storing
        $user->password = password_hash($user->password, PASSWORD_DEFAULT);

        // Check if user already exists
        $existingUser = $this->userRepository->getByEmail($user->email);
        if ($existingUser) {
            throw new UserAlreadyExistsException(); // custom exception
        }

        return $this->userRepository->create($user); // create user
    }
}