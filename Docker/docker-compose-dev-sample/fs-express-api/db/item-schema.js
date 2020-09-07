const db = require('./db');

const itemSchema = new db.mongoose.Schema({
    name: String,
    inStockCount: Number,
    photoUrl: String
});

module.exports = {
    ItemSchema: itemSchema
}