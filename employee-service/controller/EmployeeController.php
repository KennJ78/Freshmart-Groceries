<?php
require_once '../model/Employee.php';
require_once '../server/dbcon.php';

class EmployeeController
{
    private $employee;

    public function __construct($db)
    {
        $this->employee = new Employee($db);
    }

    public function createEmployee($employeeInput)
    {
        $response = $this->employee->storeEmployee($employeeInput);
        http_response_code($response['status']);
        echo json_encode($response);
    }

    public function getAllEmployees()
    {
        $response = $this->employee->getAllEmployees();
        http_response_code($response['status']);
        echo json_encode($response);
    }

    public function getEmployeeById($id)
    {
        $response = $this->employee->getEmployeeById($id);
        http_response_code($response['status']);
        echo json_encode($response);
    }

    public function updateEmployee($id, $employeeInput)
    {
        $response = $this->employee->updateEmployee($id, $employeeInput);
        http_response_code($response['status']);
        echo json_encode($response);
    }

    public function deleteEmployee($id)
    {
        $response = $this->employee->deleteEmployee($id);
        http_response_code($response['status']);
        echo json_encode($response);
    }
}
