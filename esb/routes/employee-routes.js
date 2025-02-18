
const express = require('express')
const router = express.Router()

//const requireAuth = require('../middleware/requireAuth')
const {
    fetchEmployee, DeleteEmployee, addEmployee
} = require('../controllers/employee-controller')

//router.use(requireAuth)

router.post('/new', addEmployee)
router.get('/all', fetchEmployee)
router.delete('/delete/:employeeId', DeleteEmployee)

module.exports = router