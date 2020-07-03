import { Application, Router } from "https://deno.land/x/oak/mod.ts";
import { validateJwt } from "https://deno.land/x/djwt/validate.ts";
import { makeJwt, setExpiration, Jose, Payload } from "https://deno.land/x/djwt/create.ts";

const key = "secret-key";
const payload: Payload = {
  iss: "Jon Doe",
  exp: setExpiration(new Date().getTime() + 60000),
};
const header: Jose = {
  alg: "HS256",
  typ: "JWT",
};


const router = new Router();
router
  .get("/", (context) => {
    context.response.body = "JWT Example!";
  })
  .get("/generate", (context) => {
    context.response.body = makeJwt({ header, payload, key }) + "\n";
  })
  .get("/validate/:token", async (context) => {
    if ( context.params && context.params.token && (await validateJwt(context.params.token, key)).isValid) {
      context.response.body = "Valid JWT\n";
    } else {
      context.response.body = "Invalid JWT\n";
    }
  });

const app = new Application();
app.use(router.routes());
app.use(router.allowedMethods());

await app.listen({ port: 8000 });
