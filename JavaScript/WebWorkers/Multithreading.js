worker = new Worker('worker.js');
worker.addEventListener('message', receiveMessage);

function receiveMessage(e) {
    console.log(e.data);
}

worker.postMessage('cowboy');
self.addEventListener('message', receiveMessage);

function receiveMessage(e) 
{
    self.postMessage('Sup, ' + e.data + '?');
}
worker.postMessage({
    operation: 'update',
    id: 41,
    occupation: 'cowboy',
    date: new Date()
});
