const db = require('../db/db');
const { ItemSchema } = require('../db/item-schema');

const Item = db.mongoose.model('Item', ItemSchema);

module.exports = {
    Item: Item
}