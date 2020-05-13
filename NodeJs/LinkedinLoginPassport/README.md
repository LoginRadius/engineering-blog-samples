## LinkedIn login implementaion using passport and node JS.

This is a sample project to start with Facebook authentication using nodeJS. 

### Prerequisites 

1. Install Node and NPM
2. Basic knowledge of HTML, JS

### How to start 

1. Clone the repository
2. Go to the directory `LinkedinLoginPassport`

```
cd LinkedinLoginPassport\
```
3. Enter the follwoing command 

```
npm install
```
4. Open the file `config.js` in your code editor and replace the follwoing <APP_ID> and <APP_SECRET> with your Facebook app id and secret.

`````` JS
module.exports = {
  'linkedinAuth': {
    'clientID': '<CLIENT_ID>', // your App ID 
    'clientSecret': '<CLIENT_SECRET>', // your App Secret
    'callbackURL': 'http://localhost:3000/auth/linkedin/callback'
  }
}

``````
5. Then run the follwoing command in your terminal

```
npm start
```
6. Open the link [http://localhost:3000](http://localhost:3000)




