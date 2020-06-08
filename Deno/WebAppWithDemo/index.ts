import { Application } from "https://deno.land/x/abc@v1.0.0-rc10/mod.ts";

const app = new Application();

app
  .get("/hello", (c) => {
    return "Hello World"
  })
  .static("/", "./public")
  .start({ port: 8000 });