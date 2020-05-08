/*  EXPRESS SETUP  */

const express = require('express');
const app = express();

app.get('/', (req, res) => res.sendFile('auth.html', { root : __dirname}));

const port = process.env.PORT || 3000;
app.listen(port , () => console.log('App listening on port ' + port));
/* Express Session */

const session = require('express-session');
app.use(session({ secret: 'SECERT' }));

/*  PASSPORT SETUP  */

const passport = require('passport');
var userProfile;
app.use(passport.initialize());
app.use(passport.session());

app.get('/success', (req, res) => res.send(userProfile));
app.get('/error', (req, res) => res.send("error logging in"));

passport.serializeUser(function(user, cb) {
  cb(null, user);
});

passport.deserializeUser(function(obj, cb) {
  cb(null, obj);
});

/*  TWITTER AUTH  */

const TwitterStrategy = require('passport-twitter').Strategy;

const TWITTER_APP_ID = 'TWITTER_ID';
const TWITTER_APP_SECRET = 'TWITTER_SECERT';


passport.use(new TwitterStrategy({
    consumerKey: TWITTER_APP_ID,
  consumerSecret: TWITTER_APP_SECRET,
    callbackURL: "http://127.0.0.1:3000/auth/twitter/callback"
  },
  function(token, tokenSecret, profile, cb) {
    userProfile=profile;
        return cb(null, profile);  
  }
));

app.get('/auth/twitter',
  passport.authenticate('twitter'));

app.get('/auth/twitter/callback', 
  passport.authenticate('twitter', { failureRedirect: '/login' }),
  function(req, res) {
    // Successful authentication, redirect home.
    res.redirect('/success');
  });
  