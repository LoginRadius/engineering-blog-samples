// Importing modules 
const mongoose = require('mongoose');
const validator = require('validator');
var crypto = require('crypto'); 
  
// Creating user schema 
const UserSchema = new mongoose.Schema({ 
    name : { 
        type : String, 
        required : true,
        trim : true
    }, 
    email : { 
        type : String, 
        required : true,
        unique : true,
        trim : true,
        validate(value) {
            if (!validator.isEmail(value)) {
                throw new Error("Email is not valid")
            }
        }
    }, 
    hash : String, 
    salt : String 
}); 
  
// Method to set salt and hash the password for a user 
// setPassword method first creates a salt unique for every user 
// then it hashes the salt with user password and creates a hash 
// this hash is stored in the database as user password 
UserSchema.methods.setPassword = function(password) { 
     
 // Creating a unique salt for a particular user 
    this.salt = crypto.randomBytes(16).toString('hex'); 
  
    // Hashing user's salt and password with 1000 iterations, 
     
    this.hash = crypto.pbkdf2Sync(password, this.salt,  
    1000, 64, `sha512`).toString(`hex`); 
}; 
  
// Method to check the entered password is correct or not 
// valid password method checks whether the user 
// password is correct or not 
// It takes the user password from the request  
// and salt from user database entry 
// It then hashes user password and salt 
// then checks if this generated hash is equal 
// to user's hash in the database or not 
// If the user's hash is equal to generated hash  
// then the password is correct otherwise not 
UserSchema.methods.validPassword = function(password) { 
    var hash = crypto.pbkdf2Sync(password,  
    this.salt, 1000, 64, `sha512`).toString(`hex`); 
    return this.hash === hash; 
}; 
  
// Exporting module to allow it to be imported in other files 
const User = mongoose.model('User', UserSchema);
module.exports User;
