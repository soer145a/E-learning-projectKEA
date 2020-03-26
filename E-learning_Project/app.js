console.log("X");
let mainArea = document.querySelector("#mainContent");
function changeMainContent(e) {
  console.log(e);
  let courseID = e.dataset.courseid;
  mainArea.innerHTML = courseID;
}
