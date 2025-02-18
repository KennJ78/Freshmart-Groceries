require('dotenv').config()

const express = require('express')
const mongoose = require('mongoose')

const employeeRoutes = require('./route')

//init app
const app = express()

//middleware
app.use(express.json())
app.use((req, res, next) =>{
    console.log(req.path, req.method)
    next()
})

mongoose.connect(process.env.DB)
    .then(() =>{
        app.listen(process.env.PORT, () =>{
            console.log(`Connected to database and listening to port ${process.env.PORT}`)
        })
    }).catch(error =>{
        console.log(error)
    })


app.use('/employee', employeeRoutes)