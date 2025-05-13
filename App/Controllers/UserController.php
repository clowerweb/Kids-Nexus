<?php
/**
 * User Controller
 *
 * Handles API requests for user management
 */
declare(strict_types = 1);

namespace App\Controllers;

use App\Models\User;
use App\Services\UserService;

class UserController extends BaseController {
    /**
     * UserService instance
     * @var UserService
     */
    private UserService $userService;
    
    /**
     * Constructor
     */
    public function __construct() {
        parent::__construct();
        $this->userService = new UserService();
    }
    
    /**
     * Get all users
     * 
     * @return array List of users
     */
    public function index(): array {
        return [
            'success' => true,
            'data' => $this->userService->getAllUsers()
        ];
    }
    
    /**
     * Get user by ID
     * 
     * @param int $id User ID
     * @return array User data
     */
    public function get(int $id): array {
        $user = $this->userService->getUserById($id);
        
        if (!$user) {
            return [
                'success' => false,
                'message' => 'User not found'
            ];
        }
        
        return [
            'success' => true,
            'data' => $user
        ];
    }
    
    /**
     * Create a new user
     * 
     * @return array Result of user creation
     */
    public function create(): array {
        $data = $this->getRequestData();
        $user = new User($data);
        
        $result = $this->userService->createUser($user);
        
        if ($result === true) {
            return [
                'success' => true,
                'message' => 'User created successfully'
            ];
        }
        
        return [
            'success' => false,
            'errors' => $result
        ];
    }
    
    /**
     * Update an existing user
     * 
     * @param int $id User ID
     * @return array Result of user update
     */
    public function update(int $id): array {
        $data = $this->getRequestData();
        $user = new User($data);
        
        $result = $this->userService->updateUser($id, $user);
        
        if ($result === true) {
            return [
                'success' => true,
                'message' => 'User updated successfully'
            ];
        }
        
        return [
            'success' => false,
            'errors' => $result
        ];
    }
    
    /**
     * Delete a user
     * 
     * @param int $id User ID
     * @return array Result of user deletion
     */
    public function delete(int $id): array {
        $result = $this->userService->deleteUser($id);
        
        if ($result) {
            return [
                'success' => true,
                'message' => 'User deleted successfully'
            ];
        }
        
        return [
            'success' => false,
            'message' => 'User not found'
        ];
    }
    
    /**
     * Authenticate a user
     * 
     * @return array Authentication result
     */
    public function login(): array {
        $data = $this->getRequestData();
        
        if (!isset($data['login']) || !isset($data['password'])) {
            return [
                'success' => false,
                'message' => 'Login and password are required'
            ];
        }
        
        $user = $this->userService->authenticate($data['login'], $data['password']);
        
        if ($user) {
            // Generate JWT token or session here
            return [
                'success' => true,
                'message' => 'Login successful',
                'data' => $user
            ];
        }
        
        return [
            'success' => false,
            'message' => 'Invalid login credentials'
        ];
    }
}
