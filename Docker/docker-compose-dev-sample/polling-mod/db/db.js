const mongoose = require('mongoose');

function connectDB() {
    return mongoose.connect(process.env.MONGODB_CONNECTION)
        .then(data => { console.log("Connected to MongoDB"); console.log(data); return data; })
        .catch(err => { console.error(err); })
}

module.exports = {
    mongoose,
    connectDB
}

