<?php
/**
 * User Model
 *
 * Represents a user in the system
 */
declare(strict_types = 1);

namespace App\Models;

class User extends BaseModel {
    /**
     * Username for the user
     * @var string
     */
    public string $username;

    /**
     * User's email
     * @var string
     */
    public string $email;

    /**
     * Table name for the model
     * @var string
     */
    protected string $table = 'users';
    
    /**
     * Fields that can be filled
     * @var array
     */
    protected array $fillable = [
        'username',
        'email',
        'password',
        'first_name',
        'last_name',
        'age',
        'grade',
        'parent_email',
        'is_active',
        'created_at',
        'updated_at'
    ];
    
    /**
     * Create a new user instance
     * 
     * @param array $data User data
     */
    public function __construct(array $data = []) {
        if (!empty($data)) {
            $this->fill($data);
        }
    }
    
    /**
     * Validates user data
     * 
     * @return array Validation errors or empty array if valid
     */
    public function validate(): array {
        $errors = [];
        
        // Username validation
        if (empty($this->data['username'])) {
            $errors['username'] = 'Username is required';
        } elseif (strlen($this->data['username']) < 3) {
            $errors['username'] = 'Username must be at least 3 characters';
        }
        
        // Email validation
        if (empty($this->data['email'])) {
            $errors['email'] = 'Email is required';
        } elseif (!filter_var($this->data['email'], FILTER_VALIDATE_EMAIL)) {
            $errors['email'] = 'Invalid email format';
        }
        
        // Password validation
        if (isset($this->data['password']) && !empty($this->data['password'])) {
            if (strlen($this->data['password']) < 8) {
                $errors['password'] = 'Password must be at least 8 characters';
            }
        }
        
        return $errors;
    }
}
