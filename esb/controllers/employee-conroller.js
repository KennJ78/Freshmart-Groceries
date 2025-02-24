const axios = require('axios');
require('dotenv').config();

const EMPLOYEE_SERVICE = process.env.EMPLOYEE_SERVICE;

// Create Employee
exports.createEmployee = async (req, res) => {
    try {
        const response = await axios.post(`${EMPLOYEE_SERVICE}/create.php`, req.body);
        res.status(response.status).json(response.data);
    } catch (error) {
        res.status(error.response?.status || 500).json({ error: error.message });
    }
};

// Get All Employees
exports.getAllEmployees = async (req, res) => {
    try {
        const response = await axios.get(`${EMPLOYEE_SERVICE}/read.php`);
        res.status(response.status).json(response.data);
    } catch (error) {
        res.status(error.response?.status || 500).json({ error: error.message });
    }
};

// Get Employee by ID
exports.getEmployeeById = async (req, res) => {
    try {
        const { id } = req.params;
        const response = await axios.get(`${EMPLOYEE_SERVICE}/read.php?id=${id}`);
        res.status(response.status).json(response.data);
    } catch (error) {
        res.status(error.response?.status || 500).json({ error: error.message });
    }
};

// Update Employee
exports.updateEmployee = async (req, res) => {
    try {
        const { id } = req.params;
        const response = await axios.put(`${EMPLOYEE_SERVICE}/update.php?id=${id}`, req.body);
        res.status(response.status).json(response.data);
    } catch (error) {
        res.status(error.response?.status || 500).json({ error: error.message });
    }
};

// Delete Employee
exports.deleteEmployee = async (req, res) => {
    try {
        const { id } = req.params;
        const response = await axios.delete(`${EMPLOYEE_SERVICE}/delete.php?id=${id}`);
        res.status(response.status).json(response.data);
    } catch (error) {
        res.status(error.response?.status || 500).json({ error: error.message });
    }
};
