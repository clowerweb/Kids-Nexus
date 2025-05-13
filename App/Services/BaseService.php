<?php
/**
 * Base Service
 *
 * All services extend this base class
 */
declare(strict_types = 1);

namespace App\Services;

use App\Database\Database;
use Exception;

abstract class BaseService {
    /**
     * Database connection
     * @var Database
     */
    protected Database $db;
    
    /**
     * Constructor
     */
    public function __construct() {
        // Get database connection
        $this->db = Database::getInstance();
    }
    
    /**
     * Begin a transaction
     */
    protected function beginTransaction(): void {
        $this->db->beginTransaction();
    }
    
    /**
     * Commit a transaction
     */
    protected function commit(): void {
        $this->db->commit();
    }
    
    /**
     * Rollback a transaction
     */
    protected function rollback(): void {
        $this->db->rollback();
    }
    
    /**
     * Execute operations within a transaction
     * 
     * @param callable $callback Function to execute within the transaction
     * @return mixed Result of the callback
     * @throws Exception if the callback throws an exception
     */
    protected function transaction(callable $callback): mixed {
        $this->beginTransaction();
        
        try {
            $result = $callback();
            $this->commit();
            return $result;
        } catch (Exception $e) {
            $this->rollback();
            throw $e;
        }
    }
}
