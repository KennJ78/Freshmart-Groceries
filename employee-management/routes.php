<?php
require_once __DIR__ . '/controllers/EmployeeController.php';

header("Content-Type: application/json");

$uri = explode('/', trim($_SERVER['REQUEST_URI'], '/'));
$method = $_SERVER['REQUEST_METHOD'];

$employeeController = new EmployeeController();

if ($uri[0] === 'employee') {
    if ($method === 'GET' && isset($uri[1])) {
        $employeeController->getOne($uri[1]);
    } elseif ($method === 'GET') {
        $employeeController->getAll();
    } elseif ($method === 'POST') {
        $employeeController->create();
    } else {
        http_response_code(405);
        echo json_encode(["message" => "Method not allowed"]);
    }
} else {
    http_response_code(404);
    echo json_encode(["message" => "Not Found"]);
}
