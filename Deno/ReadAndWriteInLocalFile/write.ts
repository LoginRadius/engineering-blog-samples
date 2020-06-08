import { readLines } from "https://deno.land/std@v0.52.0/io/bufio.ts";

console.log('Start typing...');

const encoder = new TextEncoder();
await Deno.writeFile("input.txt", new Uint8Array());

// Listen to stdin input by readLines
for await(const line of readLines(Deno.stdin)) {
   const data = encoder.encode(line+"\n");
   await Deno.writeFile("input.txt", data, {append: true});
   console.log("Wrote the above text in input.txt\n") 
}