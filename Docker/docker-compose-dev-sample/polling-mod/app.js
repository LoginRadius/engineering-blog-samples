const { Consumer } = require('sqs-consumer');
const AWS = require('aws-sdk');
const db = require('./db/db');
const { ItemSchema } = require('./db/item-schema');
const { Mongoose } = require('mongoose');

AWS.config.update({
    region: process.env.AWS_REGION,
    accessKeyId: process.env.AWS_ACCESS_KEY,
    secretAccessKey: process.env.AWS_SECRET_ACCESS_KEY
});

db.connectDB()
    .then(data => {
        console.log("Connected To DB")
    })
    .catch(err => console.log(err));


const app = Consumer.create({
    queueUrl: process.env.AWS_QUEUE_URL,
    handleMessage: (message) => {
        console.log("Message from queue : " + message);
        let messageData = JSON.parse(message.Body);
        messageData = JSON.parse(messageData);
        /* Parse twice */

        const ItemModel = db.mongoose.model('Item', ItemSchema);
        ItemModel.findById(messageData._id)
            .then(item => {
                if (item.inStockCount > 0) {
                    item.inStockCount = item.inStockCount - 1;
                    return item.save();
                }
                if (item.inStockCount == 0)
                    return "Out of Stock";

            }).then(result => {
                console.log(`Updated DB : ${result} `);
            })


    },
    sqs: new AWS.SQS()
});

app.on('error', (err) => {
    console.error("Error in Polling module ");
    console.error("Error in Polling module ");
    console.error("Error in Polling module ");
    console.error("Error in Polling module ");
    console.error("Error in Polling module ");
    console.error("Error in Polling module ");

    console.error(err.message);
    process.exit(0);
});

app.on('processing_error', (err) => {
    console.error(err.message);
});

app.on('timeout_error', (err) => {
    console.error(err.message);
});

app.start();