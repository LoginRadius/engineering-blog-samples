const mongoose = require('mongoose');

function connectDB() {
    return mongoose.connect(process.env.MONGODB_CONNECTION)
        .then(data => {
            console.log("Connected to MongoDB");
            console.log(data.connections[0]._connectionString);
            return data;
        })
        .catch(err => {
            console.error(err);
            throw new Error('database failed to connect');
        })
}

module.exports = {
    mongoose,
    connectDB
}

