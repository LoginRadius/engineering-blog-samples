const http = require('http');
const fs = require('fs');
const path = require('path');
const hostname = 'localhost';
const PORT = 3000;

// creatae 
const server = http.createServer(serverHandler)

function serverHandler (req, res) {
  if(req.method === 'GET' && req.url === '/') {
  let filePath = path.resolve(__dirname, 'public/index.html')
  console.log("filePath", filePath)
  let fileExists = fs.existsSync(filePath);
  if (!fileExists) {
    res.statusCode = 404;
    res.setHeader('Content-Type', 'text/html');
    res.end('<h3>Page not found</h3>')
  } else {
    res.statusCode = 200;
    res.setHeader('Content-Type', 'text/html');
    fs.createReadStream(filePath).pipe(res);
  }
  } 
  if (req.method === 'GET' && req.url === "/notes") {
    const notes = [
      {
        id: 1,
        title: "Demo Note"
      },
      {
        id: 2,
        title: "Another Note"
      }
    ]

    res.statusCode = 200;
    res.setHeader('Content-Type', 'application/json');
    res.end(JSON.stringify(notes));
  } else {
     res.setHeader('Content-Type', 'application/json')
    res.end(JSON.stringify({message: `${req.method} is not supported for ${req.url}`}))
  } 
}

server.listen(PORT, hostname, () => {
  console.log(`Server running at ${hostname}:${PORT}`);
})