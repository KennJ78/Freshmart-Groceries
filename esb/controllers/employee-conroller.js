const axios = require('axios');

const getEmployees = async (req, res) => {
    try {
        const response = await axios.get(`${process.env.EMPLOYEE_SERVICE}/getemp`);
        res.status(200).json(response.data);
    } catch (error) {
        res.status(500).json({ success: false, message: error.message });
    }
};

const createEmployee = async (req, res) => {
    try {
        const response = await axios.post(`${process.env.EMPLOYEE_SERVICE}/create`, req.body);
        res.status(201).json(response.data);
    } catch (error) {
        res.status(500).json({ success: false, message: error.message });
    }
};

module.exports = { getEmployees, createEmployee };