import { MongoClient } from "https://deno.land/x/mongo@v0.30.0/mod.ts";

  const client = new MongoClient();

  // Connecting to a Mongo Atlas Database
  await client.connect({
    db: 'deno_auth',
    tls: true,
    servers: [
      {
        host: "dbhost",
        port: 27017,
      },
   ],
    credential: {
      username: "dbName",
      password: "dbPassword",
      db: "admin",
      mechanism: "SCRAM-SHA-1",
    },
  });

 console.log("Database connected!");
 const db = client.database("deno_auth");

 export default db;