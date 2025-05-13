<?php
/**
 * Base Controller
 *
 * All controllers extend this base class
 */
declare(strict_types = 1);

namespace App\Controllers;

abstract class BaseController {
    /**
     * Constructor
     */
    public function __construct() {
        // Common initialization for all controllers
    }

    /**
     * Get request data from JSON body
     * 
     * @return array Decoded JSON data
     */
    protected function getRequestData(): array {
        $json = file_get_contents('php://input');
        $data = json_decode($json, true);

        if (json_last_error() !== JSON_ERROR_NONE) {
            return [];
        }
        
        return $data;
    }
}
