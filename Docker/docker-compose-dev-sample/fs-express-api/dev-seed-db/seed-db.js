const db = require('../db/db');
const { ItemSchema } = require('../db/item-schema');
const { Item } = require('../models/item-model');

/* Do what ever here to seed the database */

async function seedDatabase() {
    return db.connectDB().then(data => {
        console.log("Seed Database");
        return Item.find({ name: "My Super Phone" });
    }).then(data => {
        if (data.length == 0) {
            const item = new Item({
                name: "My Super Phone",
                inStockCount: 20,
                photoUrl: "https://upload.wikimedia.org/wikipedia/commons/thumb/7/74/Alt_Telefon.jpg/698px-Alt_Telefon.jpg"
            });
            return item.save();
        }
        else return 'Not adding, document already exists';
    })
        .then(data => {
            console.log("Saved item -----------------------");
            console.log(data);
        }).catch(err => {
            console.error("Seed DB Failed");
            console.error(err);
            throw new Error("Create DB Connection wrapper failed");
        });
}


module.exports = seedDatabase;