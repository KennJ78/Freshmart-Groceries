<?php
require_once '../controller/EmployeeController.php';
require_once 'dbcon.php';

header("Content-Type: application/json");

$controller = new EmployeeController($conn);

$method = $_SERVER['REQUEST_METHOD'];
$request_uri = explode("/", $_SERVER['REQUEST_URI']);
$resource = end($request_uri);

if ($method == 'POST') {
    $data = json_decode(file_get_contents("php://input"), true);
    $controller->createEmployee($data);
} elseif ($method == 'GET' && is_numeric($resource)) {
    $controller->getEmployeeById($resource);
} elseif ($method == 'GET') {
    $controller->getAllEmployees();
} elseif ($method == 'PUT' && is_numeric($resource)) {
    $data = json_decode(file_get_contents("php://input"), true);
    $controller->updateEmployee($resource, $data);
} elseif ($method == 'DELETE' && is_numeric($resource)) {
    $controller->deleteEmployee($resource);
} else {
    http_response_code(405);
    echo json_encode(['status' => 405, 'message' => 'Method Not Allowed']);
}
