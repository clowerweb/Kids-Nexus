<?php
/**
 * Home Controller
 *
 * Default controller for the API
 */
declare(strict_types = 1);

namespace App\Controllers;

class HomeController extends BaseController {
    /**
     * Default method - provides basic API info
     * 
     * @return array API information
     */
    public function index(): array {
        return [
            'name' => 'Kids Nexus API',
            'version' => API_VERSION,
            'status' => 'running',
            'message' => 'Welcome to the Kids Nexus API - a platform for AI-powered personalized education'
        ];
    }
    
    /**
     * Health check endpoint
     * 
     * @return array API health status
     */
    public function health(): array {
        // You could add database connection check and other health checks here
        return [
            'status' => 'healthy',
            'timestamp' => date('Y-m-d H:i:s')
        ];
    }
}
