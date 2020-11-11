// addEventListener is directly accessible in worker file
addEventListener("message", (event) => {
  // extract person passed from main script
  let person = event.data;
  registerMember(person);
});

function registerMember(member) {
  let i = 0;
  while (i < Math.pow(10, 10)) {
    i++;
  }
  // send data back to main thread
  postMessage(true);
  close();
}
