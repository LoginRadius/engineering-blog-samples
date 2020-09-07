const express = require('express')

const AWS = require('aws-sdk');
const q = require('./infra/queue-con');
const db = require('./db/db');
const { ItemSchema } = require('./db/item-schema');
const { Item } = require('./models/item-model');
const seedDatabase = require('./dev-seed-db/seed-db');

const app = express();
app.use(express.json());

app.use((req, res, next) => {
    res.setHeader('Access-Control-Allow-Origin', '*');
    res.setHeader('Access-Control-Allow-Methods', 'GET, POST, PUT, PATCH, DELETE');
    res.setHeader('Access-Control-Allow-Headers', 'Content-Type, Authorization');
    next();
})

let queueUrl = '';

app.get('/api/hello', (req, res, _) => {
    res.send('Hello World');
});

/* To POST The data */
app.post('/api/tryAddToCart', (req, res, _) => {

    console.log(req.body);

    let dataToSend = JSON.stringify(req.body);
    q.sendMessage(JSON.stringify(dataToSend), queueUrl).then(data => {
        console.log(data);
        res.send(data);
    }).catch(err => {
        console.error(err);
        res.send(err);
    })
});

app.get('/api/getItemsFS', async (req, res, _) => {
    const items = await Item.find();
    res.send(items);
})

const port = process.env.API_APP_PORT || 5000;

q.createQueue()
    .then(data => {
        queueUrl = process.env.AWS_SQS_FQ_URL;
        console.log(`QUEUE URL = ${queueUrl}`);
        return queueUrl;

    })
    .then(data => {
        console.log("Will call seedDatabase now");
        if (process.env.NODE_ENV == "development") {
            return seedDatabase();
        } else {
            console.log("Non-Development mode, connecting to DB");
            return db.connectDB();
        }
    })
    .then(data => {
        console.log("Before listening");
        app.listen(port, () => { console.log(`Listening on ${port}`) });
    })
    .catch(err => {
        console.exception("Something went wrong in the app startup");
        console.log(err);
        console.error("Create DB Connection wrapper failed");
        process.exit(-2);
    })


