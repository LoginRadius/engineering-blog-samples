import { MongoClient } from "https://deno.land/x/mongo@v0.30.0/mod.ts";

const dbString = `DB_STRING`;
const client = new MongoClient();
await client.connect(dbString);
const db = client.database("deno_auth");
export default db;