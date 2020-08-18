function addDOMContent(content) {
  const node = document.createElement('h1');
  node.innerText = content;
  document.body.appendChild(node);
}

export default addDOMContent;