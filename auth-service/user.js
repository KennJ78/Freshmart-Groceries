const mongoose = require('mongoose')
const validator = require('validator')
const bcrypt = require('bcryptjs')

const Schema = mongoose.Schema

const userSchema = Schema({
    username: {
        type: String,
        required: true,
        unique: true
    },

    password: {
        type: String,
        required: true,
    },

    userLevel: {
        type: String,
        required: true
    }
}, {timestamps: true})

//signup method
userSchema.statics.signup = async function(username, password, userLevel){
    if(!username || !password || !userLevel){
        throw Error('All fields are required!')
    }

    const exists = await this.findOne({username})

    if(exists){
        throw Error('An account has already been made using this username!')
    }

    if(!validator.isStrongPassword(password)){
        throw Error('Password is weak. Please use a strong passowrd!')
    }
    const salt = bcrypt.genSaltSync(15)
    const hashedPassword = bcrypt.hashSync(password, salt)
    const user = await this.create({username, password:hashedPassword, userLevel})

    return user._id
}

//login method
userSchema.statics.login = async function (username, password) {
    if(!username || !password){
        throw Error('All fields are required!')
    }

    const user = await this.findOne({username})

    if(!user){
        throw Error('No account exist wth that username')
    }

    if(!bcrypt.compareSync(password, user.password)){
        throw Error('Incorrect password. Please try again')
    }

    return {id: user._id, username:user.username}
    
}

module.exports = mongoose.model('User', userSchema)