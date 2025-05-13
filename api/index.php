<?php
/**
 * Kids Nexus API - Main Entry Point
 * 
 * This file serves as the entry point for all API requests.
 * It handles routing in the format: /api/{controller}/{method}/{param}
 */
declare(strict_types = 1);

use App\Config\Router;
use Dotenv\Dotenv;

/**
 * Composer autoloader
 */
require_once dirname(__DIR__) . '/vendor/autoload.php';

// Define the base directory
define("BASEPATH", dirname(__DIR__));

// API configuration
const API_VERSION = '1.0';

// Handle CORS for API requests
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS');
header('Access-Control-Allow-Headers: Content-Type, Authorization');

// Handle preflight requests
if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    header('HTTP/1.1 204 No Content');
    exit();
}

// Load environment variables
if (file_exists(BASEPATH . '/.env')) {
    $dotenv = Dotenv::createImmutable(BASEPATH);
    $dotenv->load();
    define('DEBUG_MODE', $_ENV['ENVIRONMENT'] !== 'production');
}

// Get the request URI
$requestUri = $_SERVER['REQUEST_URI'];

// Remove the base path and leading slash if needed
$basePath = '/api';
$uri = trim(substr($requestUri, strlen($basePath)), '/');

// Parse the URI segments
$segments = explode('/', $uri);

// Extract controller, method, and params
$controllerName = !empty($segments[0]) ? ucfirst($segments[0]) . 'Controller' : 'HomeController';
$methodName = !empty($segments[1]) ? $segments[1] : 'index';
$params = array_slice($segments, 2);

// Initialize the router
$router = new Router();

// Route the request
$router->route($controllerName, $methodName, $params);
