### Sending mail using Nodemailer
![Nodemailer Logo](https://raw.githubusercontent.com/nodemailer/nodemailer/master/assets/nm_logo_200x136.png)

 Nodemailer is a module for Node.js which allows one to send emails easily.

### Requirements
Node.js v6.0.0 or newer.

#### How to send...?
 Download the Nodemailer using npm :

  ```
  npm install nodemailer
  ```

After the installation you can include the Nodemailer module in any application

```
var nodemailer = require('nodemailer');
```

Now you are all set to send email

```
var transporter = nodemailer.createTransport({
 service: 'Gmail',
 auth: {
        user: 'senderEmailAddress',
        pass: 'senderPassword'
    }
});

const mailOptions = {
  from: 'senderEmailAddress', // sender address
  to: 'reciverEmailAddress', // list of receivers
  subject: 'Subject of your email', // Subject line
  html: '<p>Enter your message here.</p>'// plain text body
};

transporter.sendMail(mailOptions, function (err, info) {
   if(err)
     console.log(err)
   else
     console.log(info);
});
```
#### Note :
You may also need to follow these steps while using google account

- Enable the settings to allow less secure apps for the gmail account that you are using.
    - Here is the link : [Google less secure apps](https://myaccount.google.com/lesssecureapps)
- Allow access for "Display Unlock captch option" (Allow access to your Google account)
    - Here is the link : [Google unlock captcha](https://accounts.google.com/DisplayUnlockCaptcha)