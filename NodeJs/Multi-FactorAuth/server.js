const express = require("express");
const app = express();

const nanoid = require("nanoid");
const redis = require("redis");
const session = require("express-session");
const RedisStore = require("connect-redis")(session);

const redisClient = redis.createClient({
  url: "redis://redis-12345.c80.us-east-1-2.ec2.cloud.redislabs.com:12345",
  port: 12345,
  username: "default",
  password: "1234567890ABCDEFGHIJKLMNOPQRSTUV",
  legacyMode: true,
});
redisClient
  .connect() //Connecting to Redis Cloud
  .then(() => console.log("connected"))
  .catch((e) => console.log(e.message));
app.use(
  session({
    secret: "LoginRadius",
    resave: false,
    saveUninitialized: false,
    store: new RedisStore({ client: redisClient }),
  })
);
app.use(express.json());
app.set("view engine", "ejs");

const PORT = 5000;

const auth = (req, res, next) => {
  if (req.session.isAuth) {
    return next();
  }
  return res.redirect("/auth");
};

app.post("/auth", (req, res) => {
  let OTP = nanoid.customAlphabet("1234567890", 6)();
  req.session.OTP = OTP;
  const nodeoutlook = require("nodejs-nodemailer-outlook");

  nodeoutlook.sendEmail({
    auth: {
      user: "<yourOutlookEmail@outlook.com>",
      pass: "<yourOutlookPassword>",
    },
    from: "<yourOutlookEmail@outlook.com>",
    to: req.body.email,
    subject: "OTP",
    text: `Your One Time Password is ${OTP}`,
    onError: (e) =>
      res
        .status(500)
        .json({ message: `an error occurred ${e}, Please try again` }),
    onSuccess: (i) => res.redirect("/verify"),
  });
});
app.post("/logout", auth, (req, res) => {
  req.session.destroy();
  res.redirect("/auth");
});
app.post("/verify", (req, res) => {
  const { OTP } = req.body;
  const OTPSession = req.session.OTP;
  if (OTPSession) {
    if (OTP === OTPSession) {
      req.session.isAuth = true;
      return res.redirect("/home");
    }
    req.session.isAuth = false;
    return res.status(401).json({ message: "Incorrect OTP" });
  }
  return res.redirect("/auth");
});

app.get("/auth", (req, res) => {
  res.render("login");
});
app.get("/verify", (req, res) => {
  res.render("verify");
});
app.get("/home", auth, (req, res) => {
  res.render("home");
});

app.listen(PORT, () => {
  console.log(`Server running on port ${PORT}`);
});
