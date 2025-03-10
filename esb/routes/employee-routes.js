const express = require('express')
const router = express.Router()

//const requireAuth = require('../middleware/requireAuth')
const {
    getEmployees, createEmployee
} = require('../controllers/employee-conroller')

//router.use(requireAuth)

router.post('/new', createEmployee)
router.get('/all', getEmployees)

module.exports = router