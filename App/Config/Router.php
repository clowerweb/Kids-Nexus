<?php
/**
 * Router Class
 *
 * Handles API routing in the format: /api/{controller}/{method}/{param}
 */
declare(strict_types = 1);

namespace App\Config;

use Exception;

class Router {
    /**
     * Route the request to the appropriate controller and method
     * 
     * @param string $controllerName The name of the controller
     * @param string $methodName The name of the method
     * @param array $params Optional parameters
     * @return void
     */
    public function route(string $controllerName, string $methodName, array $params = []): void {
        // Check if the controller exists
        $controllerClass = "App\\Controllers\\{$controllerName}";
        
        if (!class_exists($controllerClass)) {
            $this->sendResponse(404, ['error' => "Controller '{$controllerName}' not found"]);
            return;
        }
        
        // Create controller instance
        $controller = new $controllerClass();
        
        // Check if the method exists and is callable
        if (!method_exists($controller, $methodName) || !is_callable([$controller, $methodName])) {
            $this->sendResponse(404, ['error' => "Method '{$methodName}' not found in controller '{$controllerName}'"]);
            return;
        }
        
        // Call the controller method with parameters
        try {
            $result = call_user_func_array([$controller, $methodName], $params);
            $this->sendResponse(200, $result);
        } catch (Exception $e) {
            $this->sendResponse(500, ['error' => $e->getMessage()]);
        }
    }
    
    /**
     * Send JSON response
     * 
     * @param int $statusCode HTTP status code
     * @param mixed $data Response data
     * @return void
     */
    private function sendResponse(int $statusCode, mixed $data): void {
        http_response_code($statusCode);
        header('Content-Type: application/json');
        echo json_encode($data);
        exit;
    }
}
