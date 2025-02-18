const axios = require('axios')

const addEmployee = async(req, res) =>{
    try{
        const response = await axios.post(`${process.env.EMPLOYEE_SERVICE}/add`, req.body)
        res.status(201).json(response.data)
    }catch(error){
        res.status(500).json({success: false, message: error.message})
    }
}

const fetchEmployee = async(req, res) =>{
    try{
        const response = await axios.get(`${process.env.EMPLOYEE_SERVICE}/`)
        res.status(200).json(response.data)
    }catch(error){
        res.status(500).json({success: false, message: error.message})
    }
}
const DeleteEmployee = async(req, res) =>{
    try{
        const response = await axios.delete(`${process.env.EMPLOYEE_SERVICE}/delete/${req.params.employeeId}`)
        res.status(200).json(response.data)
    }catch(error){
        res.status(500).json({success: false, message: error.message})
    }
}

module.exports = {fetchEmployee, DeleteEmployee, addEmployee}