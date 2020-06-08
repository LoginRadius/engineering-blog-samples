const { args } = Deno;
import { parse } from "https://deno.land/std/flags/mod.ts";

// flags:
// -h, --help: display help message
// -g, --global: display global stats
// -c, --country: get data of mentioned country

const BASE_URL: string = "https://api.covid19api.com/";

const parsedArgs = parse(args);

async function getGlobalStats() {
  const res = await fetch(`${BASE_URL}summary`);
  const data = await res.json();
  console.log(data["Global"]);
}

async function getCountryStats(country: string) {
  if (country) {
    const res = await fetch(`${BASE_URL}summary`);
    const data = await res.json();
    const index = data["Countries"].findIndex((c: any) => c.Country.toLowerCase() === country.toLowerCase())
    if (index !== -1) {
        console.log(data["Countries"][index])
    } else {
        console.log("Country Not Found")
    }
  } else {
    console.log("Country Name is needed")
  }
}

function displayHelpMsg() {
  return "flags:\n-h, --help: display help message\n-g, --global: display global stats\n-c, --country: get data of mentioned country ";
}
async function main() {
  switch (Object.keys(parsedArgs)[1]) {
    case "help":
    case "h":
      console.log(displayHelpMsg());
      break;
    case "global":
    case "g":
      await getGlobalStats();
      break;
    case "country":
    case "c":
       let country = parsedArgs.c || parsedArgs.country || ""
       await getCountryStats(country)
       break;
    default:
       console.log(displayHelpMsg());
  }
}

main();
