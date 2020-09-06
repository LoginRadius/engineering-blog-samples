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
const club = document.getElementById("root");
let worker;

function entry() {
  persons.forEach((person) => {
    const { isMember, name } = person;
    const listItem = document.createElement("li");
    listItem.textContent = name;
    if (!isMember) {
      let memeberAdded = registerMember(person);
      if (memeberAdded) club.appendChild(listItem);
    } else {
      club.appendChild(listItem);
    }
  });
}

entry();

function registerMember(member) {
  let i = 0;
  while (i < Math.pow(10, 10)) {
    i++;
  }
  return true;
  close();
}
