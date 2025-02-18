const express = require('express')
const router = express.Router()

const {
    addEmployee,
    getAllEmployee,
    DeleteEmployee
} = require('./controller')

router.post('/add', addEmployee)
router.get('/', getAllEmployee)
router.delete('/delete/:employeeId', DeleteEmployee)

module.exports = router