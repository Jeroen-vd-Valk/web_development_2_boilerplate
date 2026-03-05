<?php

namespace App\Controllers;

use App\Models\User;
use App\Models\UserDTO;
use App\Exceptions\UserAlreadyExistsException;
use App\Services\IAuthService;
use App\Services\AuthService;
use App\Framework\Controller;

class AuthController extends Controller
{
    private IAuthService $authService;

    public function __construct()
    {
        $this->authService = new AuthService();
    }

    public function login()
    {
        try {
            $data = $this->getPostData();

            if (!isset($data['email']) || !isset($data['password'])) {
                return $this->sendErrorResponse('Email and password are required', 400);
            }

            $user = $this->authService->authenticate($data['email'], $data['password']);

            if (!$user) {
                return $this->sendErrorResponse('Invalid credentials', 401);
            }

            // A DTO is used to return the user data to the client
            $userDTO = new UserDTO($user);
            $token = $this->authService->generateToken($user);

            return $this->sendSuccessResponse([
                'user' => $userDTO,
                'token' => $token,
            ]);
        } catch (\Exception $e) {
            return $this->sendErrorResponse('Internal server error', 500);
        }
    }

    public function register()
    {
        try {
            $user = $this->mapPostDataToClass(User::class);

            // basic, partial validation for demo/testing
            if (empty($user->email) || empty($user->password) || empty($user->username)) {
                return $this->sendErrorResponse('Email, username, and password are required', 400);
            }

            $user = $this->authService->register($user);

            // Return user data (excluding password for security)
            // DTOs (data transfer objects) are preferred when returning data to the client
            $userDTO = new UserDTO($user);
            return $this->sendSuccessResponse($userDTO, 201);

        } catch (UserAlreadyExistsException $e) {
            return $this->sendErrorResponse($e->getMessage(), 409); // 409: Conflict
        } catch (\Exception $e) {
            return $this->sendErrorResponse('Internal server error', 500);
        }
    }

    public function currentUser()
    {
        try {
            // Get token from Authorization header
            $headers = getallheaders();
            $authHeader = $headers['Authorization'] ?? $headers['authorization'] ?? null;

            if (!$authHeader) {
                return $this->sendErrorResponse('Authorization header is required', 401);
            }

            // Extract token from "Bearer <token>" format
            if (preg_match('/Bearer\s+(.*)$/i', $authHeader, $matches)) {
                $token = $matches[1];
            } else {
                return $this->sendErrorResponse('Invalid authorization header format', 401);
            }

            $user = $this->authService->getUserFromToken($token);

            if (!$user) {
                return $this->sendErrorResponse('Invalid or expired token', 401);
            }

            // Return user data (excluding password for security)
            $userDTO = new UserDTO($user);
            return $this->sendSuccessResponse($userDTO);
        } catch (\Exception $e) {
            return $this->sendErrorResponse('Internal server error', 500);
        }
    }
}