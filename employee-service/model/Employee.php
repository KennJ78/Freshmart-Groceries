<?php
require_once '../server/dbcon.php';

class Employee
{
    private $conn;

    public function __construct($db)
    {
        $this->conn = $db;
    }

    // Create Employee
    public function storeEmployee($employeeInput)
    {
        $FULL_Name = mysqli_real_escape_string($this->conn, $employeeInput['FULL_Name']);
        $Date_of_Birth = mysqli_real_escape_string($this->conn, $employeeInput['Date_of_Birth']);
        $Address = mysqli_real_escape_string($this->conn, $employeeInput['Address']);
        $Contact_Number = mysqli_real_escape_string($this->conn, $employeeInput['Contact_Number']);
        $Emergency_Contact_Number = mysqli_real_escape_string($this->conn, $employeeInput['Emergency_Contact_Number']);

        if (empty(trim($FULL_Name)) || empty(trim($Date_of_Birth)) || empty(trim($Address)) || empty(trim($Contact_Number)) || empty(trim($Emergency_Contact_Number))) {
            return ['status' => 422, 'message' => 'All fields are required'];
        }

        $query = "INSERT INTO employees (FULL_Name, Date_of_Birth, Address, Contact_Number, Emergency_Contact_Number) 
                  VALUES ('$FULL_Name', '$Date_of_Birth', '$Address', '$Contact_Number', '$Emergency_Contact_Number')";

        if (mysqli_query($this->conn, $query)) {
            return ['status' => 201, 'message' => 'Employee Created Successfully'];
        } else {
            return ['status' => 500, 'message' => 'Database Error: ' . mysqli_error($this->conn)];
        }
    }

    // Get All Employees
    public function getAllEmployees()
    {
        $query = "SELECT * FROM employees";
        $result = mysqli_query($this->conn, $query);

        if (mysqli_num_rows($result) > 0) {
            $employees = [];
            while ($row = mysqli_fetch_assoc($result)) {
                $employees[] = $row;
            }
            return ['status' => 200, 'data' => $employees];
        } else {
            return ['status' => 404, 'message' => 'No employees found'];
        }
    }

    // Get Employee by ID
    public function getEmployeeById($id)
    {
        $query = "SELECT * FROM employees WHERE id = $id";
        $result = mysqli_query($this->conn, $query);
        if ($row = mysqli_fetch_assoc($result)) {
            return ['status' => 200, 'data' => $row];
        } else {
            return ['status' => 404, 'message' => 'Employee not found'];
        }
    }

    // Update Employee
    public function updateEmployee($id, $employeeInput)
    {
        $FULL_Name = mysqli_real_escape_string($this->conn, $employeeInput['FULL_Name']);
        $Date_of_Birth = mysqli_real_escape_string($this->conn, $employeeInput['Date_of_Birth']);
        $Address = mysqli_real_escape_string($this->conn, $employeeInput['Address']);
        $Contact_Number = mysqli_real_escape_string($this->conn, $employeeInput['Contact_Number']);
        $Emergency_Contact_Number = mysqli_real_escape_string($this->conn, $employeeInput['Emergency_Contact_Number']);

        $query = "UPDATE employees SET 
                  FULL_Name = '$FULL_Name', 
                  Date_of_Birth = '$Date_of_Birth', 
                  Address = '$Address', 
                  Contact_Number = '$Contact_Number', 
                  Emergency_Contact_Number = '$Emergency_Contact_Number' 
                  WHERE id = $id";

        if (mysqli_query($this->conn, $query)) {
            return ['status' => 200, 'message' => 'Employee Updated Successfully'];
        } else {
            return ['status' => 500, 'message' => 'Database Error: ' . mysqli_error($this->conn)];
        }
    }

    // Delete Employee
    public function deleteEmployee($id)
    {
        $query = "DELETE FROM employees WHERE id = $id";
        if (mysqli_query($this->conn, $query)) {
            return ['status' => 200, 'message' => 'Employee Deleted Successfully'];
        } else {
            return ['status' => 500, 'message' => 'Database Error: ' . mysqli_error($this->conn)];
        }
    }
}
