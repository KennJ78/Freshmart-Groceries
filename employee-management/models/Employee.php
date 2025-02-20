<?php
require_once __DIR__ . '/../services/Database.php';

class Employee
{
    private $conn;

    public function __construct()
    {
        $db = new Database();
        $this->conn = $db->conn;
    }

    public function getAllEmployees()
    {
        $stmt = $this->conn->prepare("SELECT * FROM employees");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getEmployeeById($id)
    {
        $stmt = $this->conn->prepare("SELECT * FROM employees WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function createEmployee($data)
    {
        $stmt = $this->conn->prepare("INSERT INTO employees (full_name, date_of_birth, address, contact_number, emergency_contact) VALUES (?, ?, ?, ?, ?)");
        return $stmt->execute([$data['full_name'], $data['date_of_birth'], $data['address'], $data['contact_number'], $data['emergency_contact']]);
    }
}
