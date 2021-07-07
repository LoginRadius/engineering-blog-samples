const dotenv = require('dotenv');
dotenv.config();

const mailjet = require ('node-mailjet')
.connect(process.env.MAILJET_PUBLIC_KEY, process.env.MAILJET_SECRET_KEY)
const request = mailjet
.post("send", {'version': 'v3.1'})
.request({
  "Messages":[
    {
      "From": {
        "Email": "from@example.com",
        "Name": "from"
      },
      "To": [
        {
          "Email": "to@example.com",
          "Name": "to"
        }
      ],
      "Subject": "Greetings from Mailjet.",
      "TextPart": "My first Mailjet email",
      "HTMLPart": "<h3>Dear passenger 1, welcome to <a href='https://www.mailjet.com/'>Mailjet</a>!</h3><br />May the delivery force be with you!",
      "CustomID": "AppGettingStartedTest"
    }
  ]
})
request
  .then((result) => {
    console.log(result.body)
  })
  .catch((err) => {
    console.log(err.statusCode)
  })