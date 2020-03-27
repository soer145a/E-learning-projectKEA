console.log("X");
let mainArea = document.querySelector("#mainContent");
function changeMainContent(e) {
  console.log(e);
  let courseID = e.dataset.courseid;
  mainArea.innerHTML = courseID;
}
let infoHTMLBackup;
function editProfile() {
  console.log("EDIT");
  infoHTMLBackup = document.querySelector("#profileContent").innerHTML;
  let uFirstName = document.querySelector("#pFirstName").textContent;
  let uLastName = document.querySelector("#pLastName").textContent;
  let uEmail = document.querySelector("#pEmail").textContent;
  let uUsername = document.querySelector("#pUsername").textContent;
  let uPassword = document.querySelector("#hiddenPassword").value;
  let uID = document.querySelector("#hiddenID").value;
  document.querySelector(
    "#profileContent"
  ).innerHTML = `<form action="profile.php" method="post">
  <label><p>NEW First Name:</p>
      <input type="text" name="uFirstName" placeholder="John" value="${uFirstName}">
  </label>
  <label><p>NEW Last Name:</p>
      <input type="text" name="uLastName" placeholder="Smith" value="${uLastName}">
  </label>
  <label><p>NEW Email Address:</p>
      <input type="email" name="uEmail" placeholder="john@smith.com" value="${uEmail}">
  </label>
  <label for=""> <p> NEW Username:</p>
  <input type="text" name="uUsername" placeholder="Username" value="${uUsername}">
</label>
<label for=""><p>NEW Password:</p>
  <input type="text" name="uPassword" placeholder="XXXXX" value="${uPassword}">
</label>

  <input type="hidden" name="uID"  value="${uID}">

   <br>
  <input type="submit" value="Save!">
  <button onclick="cancelEditing(); return false;">Cancel</button>
  </form>`;
  console.log(infoHTMLBackup);
}
function cancelEditing() {
  console.log("X");
  document.querySelector("#profileContent").innerHTML = infoHTMLBackup;
}
function openDeleteModal() {
  document.querySelector("#deleteModalWindow").style.opacity = 1;
  document.querySelector("#deleteModalWindow").style.pointerEvents = "all";
  document.querySelector("#deleteModalContent").style.opacity = 1;
  document.querySelector("#deleteModalContent").style.pointerEvents = "all";
}
function closeDeleteModal() {
  document.querySelector("#deleteModalWindow").style.opacity = 0;
  document.querySelector("#deleteModalContent").style.opacity = 0;
  document.querySelector("#deleteModalWindow").style.pointerEvents = "none";
  document.querySelector("#deleteModalContent").style.pointerEvents = "none";
}
