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
        $now = time();
        $expiration = $now + (Config::$tokenExpirationHours * 3600); // Convert hours to seconds
        
        // This payload still needs an iss (issuer) and aud (audience set)
        // The payload also need a data property containing the user id, username and email
        $payload = [
            'iss' => null, // TODO: Issuer (available in the Config class as the domain property)
            'aud' => null, // TODO: Issuer (available in the Config class as the domain property)
            'iat' => $now, // Issued at time
            'nbf' => $now, // Not before
            'exp' => $expiration, // Expiration time (24 hours from now)
            // TODO: Add a data property containing the user id, username and email
        ];
        
        // TODO: Encode and return the token using the secret key and the HS256 algorithm `self::JWT_ALGORITHM`
        return "";
    }

    public function validateToken(string $token): bool
    {
        try {
            $decoded = JWT::decode($token, new Key(Config::$secretKey, self::JWT_ALGORITHM));
            
            // Validate required claims
            if (!isset($decoded->iss) || !isset($decoded->aud) || !isset($decoded->exp)) {
                return false;
            }
            
            // Validate issuer and audience match domain
            if ($decoded->iss !== Config::$domain || $decoded->aud !== Config::$domain) {
                return false;
            }
            
            return true;
        } catch (\Exception $e) {
            return false; // Invalid token
        }
    }

    public function getUserFromToken(string $token): ?User
    {
        try {
            // TODO: Decode the token and return the user from the database based on the user id in the token's data property 
            return null;
        } catch (\Exception $e) {
            return null; // Invalid token
        }

        // Get user by ID from the decoded token
        // if (isset($decoded->data->id)) {
        //     return $this->userRepository->getById($decoded->data->id);
        // }

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