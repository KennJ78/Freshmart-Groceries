
const mongoose = require('mongoose')

const Schema = mongoose.Schema

const employeeSchema = new Schema({
    name: {
        type: String,
        required: true
    },
    role: {
        type: String,
        requied: true
    }
}, {timestamps: true})

module.exports = mongoose.model('Employee', employeeSchema)
