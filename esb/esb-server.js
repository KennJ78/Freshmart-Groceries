require('dotenv').config()

const express = require('express')

//Services
const productServices = require('./routes/inventory-route')
const posServices = require('./routes/pos-routes')
const authService = require('./routes/auth-routes')
const employeeService = require('./routes/employee-routes')

//request mapper
const mapper = '/api/v1'

//init app
const app = express()

//middleware
app.use(express.json())
app.use((req, res, next) =>{
    console.log(req.path, req.method)
    next()
})

app.listen(process.env.PORT, () =>{
    console.log(`Listening to port ${process.env.PORT}`)
})

app.use(`${mapper}/inventory`, productServices)
app.use(`${mapper}/pos`, posServices)
app.use(`${mapper}/auth`, authService)
app.use(`${mapper}/employee`, employeeService)

//if no request match
app.use((req, res) =>{
    res.status(404).json({error: 'No such endpoint exists'})
})