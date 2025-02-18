const Employee = require('./employee')
const mongoose = require('mongoose')

const addEmployee = async(req, res) => {
    const {name, role} = req.body

    try {
        const employee = await Employee.create({name, role})
        res.status(200).json({success: true, message: employee})
    }catch(err){
        console.log(err)
        res.status(500).json({success: false, message: err.message})
    }
}
const getAllEmployee = async(req, res) =>{
    try{
        const employees = await Employee.find({})
        res.status(200).json({success: true, message: employees})
    }catch(err){
        console.log(err)
        res.status(500).json({success: false, message: err.message})
    }
}
const DeleteEmployee = async (req, res) => {
    const { employeeId } = req.params;
    try {
        const Demployee = await Employee.findOneAndDelete({ _id: employeeId });
        res.status(200).json({ success: true, message: Demployee });
    } catch (err) {
        console.log(err);
        res.status(500).json({ success: false, message: err.message });
    }
};

module.exports = {
    addEmployee,
    getAllEmployee,
    DeleteEmployee

}