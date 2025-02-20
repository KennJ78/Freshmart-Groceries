<?php
require_once __DIR__ . '/../controllers/employee-controller.php';

$esb = new EsbController();
$requestMethod = $_SERVER['REQUEST_METHOD'];
$requestUri = explode('/', trim($_SERVER['REQUEST_URI'], '/'));

if ($requestUri[1] === "employee") {
    switch ($requestMethod) {
        case 'POST':
            $esb->addEmployee();
            break;
        case 'GET':
            $esb->fetchEmployee();
            break;
        case 'DELETE':
            if (isset($requestUri[2])) {
                $esb->deleteEmployee($requestUri[2]);
            } else {
                http_response_code(400);
                echo json_encode(["success" => false, "message" => "Employee ID required"]);
            }
            break;
        default:
            http_response_code(405);
            echo json_encode(["success" => false, "message" => "Method Not Allowed"]);
            break;
    }
} else {
    http_response_code(404);
    echo json_encode(["success" => false, "message" => "Not Found"]);
}
