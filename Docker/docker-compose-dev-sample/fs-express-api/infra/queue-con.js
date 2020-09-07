const AWS = require('aws-sdk');

var config = {
    endpoint: new AWS.Endpoint(process.env.AWS_SQS_URL),
    accessKeyId: process.env.AWS_ACCESS_KEY,
    secretAccessKey: process.env.AWS_SECRET_ACCESS_KEY,
    region: process.env.AWS_REGION
};

let sqs = new AWS.SQS(config);

function createQueue() {

    let promise = new Promise((resolve, reject) => {
        const queueName = process.env.QUEUE_NAME;
        var params = {
            QueueName: queueName
        };
        sqs.createQueue(params, (err, data) => {
            if (err) reject(err);
            if (data) resolve(data);
        });
    })
    return promise;
}

function sendMessage(message, queueUrl) {
    let sendparams = {
        MessageBody: message,
        QueueUrl: queueUrl,
        DelaySeconds: 0
    };

    let prom = new Promise((resolve, reject) => {
        sqs.sendMessage(sendparams, function (err, data) {
            if (err) reject(err);
            if (data) resolve(data);
        });
    });

    return prom;
}

module.exports = {
    createQueue,
    sendMessage
}