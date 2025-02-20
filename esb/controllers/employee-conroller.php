<?php
require_once __DIR__ . '/../middleware/RequestHandler.php';

class EsbController
{
    private $config;

    public function __construct()
    {
        $this->config = parse_ini_file(__DIR__ . '/../.env');
    }

    public function addEmployee()
    {
        try {
            $url = $this->config['EMPLOYEE_SERVICE'] . "/add";
            $data = json_decode(file_get_contents("php://input"), true);
            $response = RequestHandler::sendRequest($url, 'POST', $data);
            http_response_code(201);
            echo json_encode($response);
        } catch (Exception $e) {
            http_response_code(500);
            echo json_encode(["success" => false, "message" => $e->getMessage()]);
        }
    }

    public function fetchEmployee()
    {
        try {
            $url = $this->config['EMPLOYEE_SERVICE'] . "/";
            $response = RequestHandler::sendRequest($url, 'GET');
            http_response_code(200);
            echo json_encode($response);
        } catch (Exception $e) {
            http_response_code(500);
            echo json_encode(["success" => false, "message" => $e->getMessage()]);
        }
    }

    public function deleteEmployee($employeeId)
    {
        try {
            $url = $this->config['EMPLOYEE_SERVICE'] . "/delete/" . $employeeId;
            $response = RequestHandler::sendRequest($url, 'DELETE');
            http_response_code(200);
            echo json_encode($response);
        } catch (Exception $e) {
            http_response_code(500);
            echo json_encode(["success" => false, "message" => $e->getMessage()]);
        }
    }
}
