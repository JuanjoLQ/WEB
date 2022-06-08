/* Custom Dragula JS */
dragula([
  document.getElementById("to-do"),
  document.getElementById("doing"),
  document.getElementById("done"),
  document.getElementById("trash")
]);

removeOnSpill: false
  .on("drag", function (el) {
    el.className.replace("ex-moved", "");
  })
  .on("drop", function (el) {
    el.className += "ex-moved";
  })
  .on("over", function (el, container) {
    container.className += "ex-over";
  })
  .on("out", function (el, container) {
    container.className.replace("ex-over", "");
  });

/* Vanilla JS to add a new task */
function addTask() {
  /* Get task text from input */
  var inputTask = document.getElementById("taskText").value;
  /* Add task to the 'To Do' column */
  document.getElementById("to-do").innerHTML +=
    "<li class='task'><p>" + inputTask + "</p></li>";
  /* Clear task text from input after adding task */
  document.getElementById("taskText").value = "";

  document.cookie = "nuevaTarea=" + inputTask;

  window.open('http://localhost/WEB/logica/insert.php', "_self");
}

/* Vanilla JS to delete tasks in 'Trash' column */
function emptyTrash() {
  /* Clear tasks from 'Trash' column */
  document.getElementById("trash").innerHTML = "";

  window.open('http://localhost/WEB/logica/delete.php', "_self");
}

function updateAll() {

  const ul1 = document.getElementById('to-do');
  const listItems1 = ul1.getElementsByTagName('span');

  let texto = "";
  for (let i = 0; i <= listItems1.length - 1; i++) {
    texto += listItems1[i].innerHTML + "//";
  }
  texto += "¬";
  const ul2 = document.getElementById('doing');
  const listItems2 = ul2.getElementsByTagName('span');
  for (let i = 0; i <= listItems2.length - 1; i++) {
    texto += listItems2[i].innerHTML + "//";
  }
  texto += "¬";
  const ul3 = document.getElementById('done');
  const listItems3 = ul3.getElementsByTagName('span');
  for (let i = 0; i <= listItems3.length - 1; i++) {
    texto += listItems3[i].innerHTML + "//";
  }
  texto += "¬";
  const ul4 = document.getElementById('trash');
  const listItems4 = ul4.getElementsByTagName('span');
  for (let i = 0; i <= listItems4.length - 1; i++) {
    texto += listItems4[i].innerHTML + "//";
  }

  document.cookie = "texto=" + texto;
  window.open('http://localhost/WEB/logica/update.php', "_self");
}