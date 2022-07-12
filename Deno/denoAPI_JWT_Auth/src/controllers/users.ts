import db from "../database/connectDB.ts";
import * as bcrypt from "https://deno.land/x/bcrypt/mod.ts";
import { UserSchema } from "../schema/user.ts";
import { create } from "https://deno.land/x/djwt@v2.4/mod.ts";
import { key } from "../utils/apiKey.ts";

const Users = db.collection<UserSchema>("users");

    //create a user
    export const signup = async({request, response}:{request:any;response:any}) => {
    const {username, password} = await request.body().value;
    const salt = await bcrypt.genSalt(8);
    const hashedPassword = await bcrypt.hash(password, salt);

    const _id = await Users.insertOne({
        username,
        password:hashedPassword
      });
      response.status =201;
      response.body = {message: "User created", userId:_id, user:username}     
};

   //signin a user
    export const signin = async ({request, response}:{request:any; response:any}) => {

    const body = await request.body();
    const {username, password} = await body.value;

    const user = await Users.findOne({username});

    if(!user) {
        response.body = 404;
        response.body = {message: `user "${username}" not found`};
        return;
    }
    const confirmPassword = await bcrypt.compare(password, user.password);
    if(!confirmPassword){
        response.body = 404;
        response.body = {message: "Incorrect password"};
        return;
    }
    
    //authenticate a user
    const payload = {
        id: user._id,
        name: username
    };
    const jwt =  await create({ alg: "HS512", typ: "JWT" }, { payload }, key);

    if(jwt) {
        response.status = 200;
        response.body = {
            userId: user._id,
            username: user.username,
            token: jwt,
        }
     } else {
        response.status = 500;
        response.body = {
            message: "internal server error"
        }
    }
        return;
    }