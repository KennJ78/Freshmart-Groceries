const User = require('./user')
const jwt = require('jsonwebtoken')

//generate token
const generateToken = (_id) =>{
    return jwt.sign({_id}, process.env.SECRET, {expiresIn: '1h'})
}


const signup = async(req, res) =>{
    const {username, password, userLevel} = req.body

    try{
        const user = await User.signup(username, password, userLevel)

        //create token
        const token = generateToken(user)
        res.status(200).json({success: true, message: {username, token, _id: user}})
    }catch(error){
        console.log('Error:', error.message);  // Add this line
        res.status(400).json({success: false, message: error.message})
    }
}

const login = async(req, res) =>{
    const {username, password} = req.body

    try{
        const user = await User.login(username, password)
        //generate token
        const token = generateToken(user.id)
        res.status(200).json({success: true, message: {username:user.username, token, _id: user.id}})
    }catch(error){
        res.status(400).json({success: false, message: error.message})
    }
}

const authenticate = async(req, res) =>{
    const {authorization} = req.params

    const token = authorization.split(' ')[1]

    try{
        const {_id} = jwt.verify(token, process.env.SECRET)
        req.user = await User.findOne({_id}).select('_id')
        
        res.status(200).json({success: true, message: 'Authenticated successfully'})

    }catch(error){
        return res.status(401).json({success: false, message: 'Request is not authorized'})
    }
}

module.exports = {signup, login, authenticate}