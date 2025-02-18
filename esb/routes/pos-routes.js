const express = require('express')
const router = express.Router()

//const requireAuth = require('../middleware/requireAuth')
const {
    newSale
} = require('../controllers/pos-controller')

//router.use(requireAuth)

router.post('/new', newSale)

module.exports = router