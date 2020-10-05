
@charset "UTF-8";
@font-face {
  font-family: Fira Sans;
  font-weight: 400;
  src: url(./font/FiraSans-Regular.otf);
}

@font-face {
  font-family: Fira Sans;
  font-style: italic;
  font-weight: 400;
  src: url(./font/FiraSans-Italic.otf);
}

@font-face {
  font-family: Fira Sans;
  font-weight: 300;
  src: url(./font/FiraSans-Light.otf);
}

@font-face {
  font-family: Fira Sans;
  font-style: italic;
  font-weight: 300;
  src: url(FiraSans-LightItalic.otf);
}

@font-face {
  font-family: Fira Sans;
  font-weight: bold;
  src: url(FiraSans-Bold.otf);
}

@page {
    size: Letter;

    @bottom-left {
        background: #14213d;
        color: #ffffff;
        content: counter(page);
        height: 1cm;
        text-align: center;
        width: 1cm;
    }

    @bottom-right {
        content: string(heading);
        font-size: 9pt;
        height: 1cm;
        vertical-align: middle;
        width: 100%;
        text-transform: uppercase;
    }

    @bottom-center {
        background: #14213d;
        content: '';
        display: block;
        height: 0.05cm;
        opacity: 0.5;
        width: 100%;
    }
}

@page :first {
    /* background: url("http://localhost:5001/cover.png"); */
    background-size: cover;
    margin: 0;
}

:root {
  --primary-color: #14213d;
  --secondary-color: #1fe494;
}

html {
  color: #393939;
  font-family: Fira Sans;
  font-size: 11pt;
  font-weight: 300;
  line-height: 1.5;
}

html body h1,
html body h2,
html body h3,
html body h4 {
  margin: 0;
}

html body h1 {
  color: #ffffff;
  font-size: 38pt;
  padding: 0;
  margin: 0;
  text-transform: uppercase;
}

html body h2 {
  string-set: heading content();
  color: #1fe494;
  font-size: 24pt;
  padding: 0;
  margin: 0;
  border-bottom: solid 2px #cbd5e0;
}


html body article#cover {
  display: flex;
  flex-direction: column;
  justify-content: flex-end;
  flex-wrap: wrap;
  height: 297mm;
}

section {
  margin-bottom: 2cm;
}

a {
  font-style: italic;
  font-size: 120%;
}
html body article#cover section {
  text-align: right;
  padding: 2cm 0.5cm;
}

html body article#introduction section#about {
  border-left: solid 3px #e8e8e8;
  padding-left: 10px;
}

html body article#introduction section#about p {
  color: #909090;
}

html body article#introduction section#features {
  border: solid 1px #1fe494;
  display: flex;
}

.feature {
  border: solid 1px tomato;
  padding: 10px;
  flex:1;
  text-align: left;
}

html body article#story img {
  width: 100%;
  height: auto;
}

html body article#insight section {
  display: flex;
  flex-direction: row;
  /* flex-wrap: wrap; */
  width: 100%;
}

html body article#insight section img {
  width: 8cm;
  height: auto;
}

.column {
  display: flex;
  flex-direction: column;
  flex-basis: 100%;
  flex: 1;
}
@media screen and (max-width: 580px) {
  body {
    font-size: 16px;
    line-height: 22px;
  }
}

.wrapper {
  margin: 0 auto;
  padding: 40px;
  max-width: 800px;
}

.table {
  margin: 0 0 40px 0;
  width: 100%;
  box-shadow: 0 1px 3px rgba(0, 0, 0, 0.2);
  display: table;
}
@media screen and (max-width: 580px) {
  .table {
    display: block;
  }
}

.row {
  display: table-row;
  background: #f6f6f6;
}
.row:nth-of-type(odd) {
  background: #e9e9e9;
}
.row.header {
  font-weight: 900;
  color: #ffffff;
  background: #ea6153;
}
.row.green {
  background: #27ae60;
}
.row.blue {
  background: #2980b9;
}
@media screen and (max-width: 580px) {
  .row {
    padding: 14px 0 7px;
    display: block;
  }
  .row.header {
    padding: 0;
    height: 6px;
  }
  .row.header .cell {
    display: none;
  }
  .row .cell {
    margin-bottom: 10px;
  }
  .row .cell:before {
    margin-bottom: 3px;
    content: attr(data-title);
    min-width: 98px;
    font-size: 10px;
    line-height: 10px;
    font-weight: bold;
    text-transform: uppercase;
    color: #969696;
    display: block;
  }
}

.cell {
  padding: 6px 12px;
  display: table-cell;
}
@media screen and (max-width: 580px) {
  .cell {
    padding: 2px 16px;
    display: block;
  }
}

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
