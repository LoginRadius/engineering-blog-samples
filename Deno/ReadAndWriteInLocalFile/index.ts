const getQuotes = async (fileName: string): Promise<Array<string>> => {
  const decoder = new TextDecoder("utf-8");
 
  const text: string = decoder.decode(await Deno.readFile(fileName));
  return text.split("\n");
 };
 
 const quotesArr: Array<string> = await getQuotes("quotes.txt");
 
 const randomQuote: string =  quotesArr[Math.floor(Math.random() * quotesArr.length)];
 console.log(randomQuote);