<?php
require_once __DIR__ . '/../models/Employee.php';

class EmployeeController
{
    public function getAll()
    {
        $employee = new Employee();
        echo json_encode($employee->getAllEmployees());
    }

    public function getOne($id)
    {
        $employee = new Employee();
        echo json_encode($employee->getEmployeeById($id));
    }

    public function create()
    {
        $data = json_decode(file_get_contents("php://input"), true);
        if (!isset($data['full_name']) || !isset($data['date_of_birth'])) {
            http_response_code(400);
            echo json_encode(["message" => "Invalid data"]);
            return;
        }

        $employee = new Employee();
        if ($employee->createEmployee($data)) {
            http_response_code(201);
            echo json_encode(["message" => "Employee created"]);
        } else {
            http_response_code(500);
            echo json_encode(["message" => "Error creating employee"]);
        }
    }
}
