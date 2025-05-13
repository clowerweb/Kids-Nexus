<?php
/**
 * User Service
 *
 * Handles business logic for user operations
 */
declare(strict_types = 1);

namespace App\Services;

use App\Models\User;

class UserService extends BaseService {
    /**
     * Get all users
     * 
     * @return array List of users
     */
    public function getAllUsers(): array {
        $query = "SELECT * FROM users WHERE is_active = 1";
        return $this->db->fetchAll($query);
    }
    
    /**
     * Get user by ID
     * 
     * @param int $id User ID
     * @return array|bool User data
     */
    public function getUserById(int $id): array|bool {
        $query = "SELECT * FROM users WHERE id = ? AND is_active = 1";
        return $this->db->fetchRow($query, [$id]);
    }
    
    /**
     * Get user by username or email
     * 
     * @param string $login Username or email
     * @return array|bool User data
     */
    public function getUserByLogin(string $login): array|bool {
        $query = "SELECT * FROM users WHERE (username = ? OR email = ?) AND is_active = 1";
        return $this->db->fetchRow($query, [$login, $login]);
    }
    
    /**
     * Create a new user
     * 
     * @param User $user User model
     * @return bool|array Success flag or validation errors
     */
    public function createUser(User $user): bool|array {
        // Validate user data
        $errors = $user->validate();
        if (!empty($errors)) {
            return $errors;
        }
        
        // Check if username or email already exists
        $existingUser = $this->getUserByLogin($user->username);
        if ($existingUser) {
            return ['username' => 'Username already exists'];
        }
        
        $existingUser = $this->getUserByLogin($user->email);
        if ($existingUser) {
            return ['email' => 'Email already exists'];
        }
        
        // Hash the password
        $userData = $user->toArray();
        if (isset($userData['password'])) {
            $userData['password'] = password_hash($userData['password'], PASSWORD_DEFAULT);
        }
        
        // Set created_at and updated_at
        $userData['created_at'] = date('Y-m-d H:i:s');
        $userData['updated_at'] = date('Y-m-d H:i:s');
        $userData['is_active'] = 1;
        
        // Build query
        $fields = array_keys($userData);
        $placeholders = array_fill(0, count($fields), '?');
        
        $query = sprintf(
            "INSERT INTO users (%s) VALUES (%s)",
            implode(', ', $fields),
            implode(', ', $placeholders)
        );
        
        // Execute query
        $this->db->query($query, array_values($userData));
        
        return true;
    }
    
    /**
     * Update an existing user
     * 
     * @param int $id User ID
     * @param User $user User model
     * @return bool|array Success flag or validation errors
     */
    public function updateUser(int $id, User $user): bool|array {
        // Validate user data
        $errors = $user->validate();
        if (!empty($errors)) {
            return $errors;
        }
        
        // Check if user exists
        $existingUser = $this->getUserById($id);
        if (!$existingUser) {
            return ['id' => 'User not found'];
        }
        
        // Update user data
        $userData = $user->toArray();
        
        // Hash the password if it's being updated
        if (!empty($userData['password'])) {
            $userData['password'] = password_hash($userData['password'], PASSWORD_DEFAULT);
        } else {
            unset($userData['password']); // Don't update password if not provided
        }
        
        // Set updated_at
        $userData['updated_at'] = date('Y-m-d H:i:s');
        
        // Build query
        $setFields = [];
        foreach ($userData as $field => $value) {
            $setFields[] = "$field = ?";
        }
        
        $query = sprintf(
            "UPDATE users SET %s WHERE id = ?",
            implode(', ', $setFields)
        );
        
        // Add ID to parameters
        $params = array_values($userData);
        $params[] = $id;
        
        // Execute query
        $this->db->query($query, $params);
        
        return true;
    }
    
    /**
     * Delete a user (soft delete)
     * 
     * @param int $id User ID
     * @return bool Success flag
     */
    public function deleteUser(int $id): bool {
        // Check if user exists
        $existingUser = $this->getUserById($id);
        if (!$existingUser) {
            return false;
        }
        
        // Soft delete the user
        $query = "UPDATE users SET is_active = 0, updated_at = ? WHERE id = ?";
        $this->db->query($query, [date('Y-m-d H:i:s'), $id]);
        
        return true;
    }
    
    /**
     * Authenticate a user
     * 
     * @param string $login Username or email
     * @param string $password Password
     * @return array|bool User data or false if authentication fails
     */
    public function authenticate(string $login, string $password): array|bool {
        $user = $this->getUserByLogin($login);
        
        if (!$user) {
            return false;
        }
        
        if (password_verify($password, $user['password'])) {
            // Remove password from returned data
            unset($user['password']);
            return $user;
        }
        
        return false;
    }
}
