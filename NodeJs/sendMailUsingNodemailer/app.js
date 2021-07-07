var nodemailer = require('nodemailer');
var tech = require('./external.js');

var transporter = nodemailer.createTransport({
 service: 'Gmail',
 auth: {
        user: tech.senderUsername,
        pass: tech.senderPassword
    }
});

const mailOptions = {
  from: tech.senderUsername, // sender address
  to: tech.reciverUsername, // list of receivers
  subject: 'Subject of your email', // Subject line
  html: '<p>Enter your message here.</p>'// plain text body
};

transporter.sendMail(mailOptions, function (err, info) {
   if(err)
     console.log(err)
   else
     console.log(info);
});