<?php
/**
 * Database Class
 *
 * Handles database connections using PDO
 */
declare(strict_types = 1);

namespace App\Database;

use PDO;
use PDOStatement;
use PDOException;
use Exception;

class Database {
    /**
     * PDO instance
     * @var PDO
     */
    private PDO $pdo;
    
    /**
     * Singleton instance
     * @var ?Database
     */
    private static ?Database $instance = null;
    
    /**
     * Constructor - Creates a database connection
     *
     * @throws Exception
     */
    private function __construct() {
        $dsn = 'mysql:host=' . $_ENV['DB_HOST'] . ';dbname=' . $_ENV['DB_NAME'] . ';port=' . $_ENV['DB_PORT'] . ';charset=utf8mb4';
        $options = [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES => false,
        ];
        
        try {
            $this->pdo = new PDO($dsn, $_ENV['DB_USER'], $_ENV['DB_PASS'], $options);
        } catch (PDOException $e) {
            throw new Exception('Database connection failed: ' . $e->getMessage());
        }
    }
    
    /**
     * Get singleton instance
     * 
     * @return self
     */
    public static function getInstance(): self {
        if (self::$instance === null) {
            self::$instance = new self();
        }
        
        return self::$instance;
    }
    
    /**
     * Begin a transaction
     */
    public function beginTransaction(): void {
        $this->pdo->beginTransaction();
    }
    
    /**
     * Commit a transaction
     */
    public function commit(): void {
        $this->pdo->commit();
    }
    
    /**
     * Rollback a transaction
     */
    public function rollback(): void {
        $this->pdo->rollBack();
    }
    
    /**
     * Execute a query
     * 
     * @param string $query SQL query
     * @param array $params Parameters for the query
     * @return PDOStatement
     */
    public function query(string $query, array $params = []): PDOStatement {
        $stmt = $this->pdo->prepare($query);
        $stmt->execute($params);
        return $stmt;
    }
    
    /**
     * Fetch a single row
     * 
     * @param string $query SQL query
     * @param array $params Parameters for the query
     * @return array|bool
     */
    public function fetchRow(string $query, array $params = []): array|bool {
        $stmt = $this->query($query, $params);
        return $stmt->fetch();
    }
    
    /**
     * Fetch all rows
     * 
     * @param string $query SQL query
     * @param array $params Parameters for the query
     * @return array
     */
    public function fetchAll(string $query, array $params = []): array {
        $stmt = $this->query($query, $params);
        return $stmt->fetchAll();
    }
}
