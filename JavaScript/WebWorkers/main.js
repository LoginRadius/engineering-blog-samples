const persons = [
  {
    name: "Joe",
    isMember: true,
  },
  {
    name: "Hriday",
    isMember: true,
  },
  {
    name: "Hridayesh",
    isMember: false,
  },
  {
    name: "Bob",
    isMember: true,
  },
  {
    name: "Daisy",
    isMember: true,
  },
];

// Our club container
const club = document.getElementById("club");
let worker;

function entry() {
  persons.forEach((person) => {
    const { isMember, name } = person;
    const listItem = document.createElement("li");
    listItem.textContent = name;
    if (!isMember) {
      worker = new Worker("worker.js");
      worker.postMessage(name);
      worker.addEventListener("message", (event) => {
        if (event.data) {
          club.appendChild(listItem);
        }
      });
    } else {
      club.appendChild(listItem);
    }
  });
}

entry();
