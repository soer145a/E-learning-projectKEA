console.log("X");
let mainArea = document.querySelector("#mainContent");
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
function showOptions(stringDivName) {
  let dropdowns = document.querySelectorAll(".dropdown-content");
  dropdowns.forEach((item) => {
    item.classList.remove("show");
  });
  if (
    document.getElementById(stringDivName).classList.contains("show") == true
  ) {
    document.getElementById(stringDivName).classList.remove("show");
  } else {
    document.getElementById(stringDivName).classList.add("show");
  }
}
async function fetchIntroduction(ID) {
  console.log("FETCH INTRODUCTION ON COURSE" + ID);
  let connection = await fetch(
    `APIs/API-fetch-introductions.php?courseID=${ID}`
  );
  let sData = await connection.json();
  console.log(sData);
  let htmlBluePrintIntroduction = await fetch(
    `blueprints/IntroductionHTMLElement.html`
  );
  let introductionHtml = await htmlBluePrintIntroduction.text();
  let htmlPrint = introductionHtml.replace("::insertp1::", sData.para1);
  htmlPrint = htmlPrint.replace("::insertp2::", sData.para2);
  htmlPrint = htmlPrint.replace("::insertp3::", sData.para3);
  htmlPrint = htmlPrint.replace("::insertp4::", sData.para4);
  mainArea.innerHTML = htmlPrint;
}
function fetchExample(ID) {
  console.log("FETCH EXAMPLE ON COURSE" + ID);
}
function fetchSummery(ID) {
  console.log("FETCH SUMMERY ON COURSE" + ID);
}
async function fetchQuiz(ID) {
  console.log("FETCH QUIZ ON COURSE" + ID);
  let connection = await fetch(`APIs/API-fetch-quiz.php?courseID=${ID}`);
  let sData = await connection.json();
  let htmlBluePrintQuiz = await fetch(`blueprints/quizHTMLElement.html`);
  let a = [sData.answer_1, sData.answer_2, sData.answer_3, sData.answer_4];
  var j, x, i;
  for (i = a.length - 1; i > 0; i--) {
    j = Math.floor(Math.random() * (i + 1));
    x = a[i];
    a[i] = a[j];
    a[j] = x;
  }
  let quizHtml = await htmlBluePrintQuiz.text();
  let htmlPrint = quizHtml.replace("::answer_1::", a[0]);
  htmlPrint = htmlPrint.replace("::answer_2::", a[1]);
  htmlPrint = htmlPrint.replace("::answer_3::", a[2]);
  htmlPrint = htmlPrint.replace("::answer_4::", a[3]);
  a.forEach((item, index) => {
    if (item == sData.answer_1) {
      htmlPrint = htmlPrint.replace(`::truthCheck${index + 1}::`, "true");
    } else {
      htmlPrint = htmlPrint.replace(`::truthCheck${index + 1}::`, "false");
    }
  });
  htmlPrint = htmlPrint.replace("::questionArea::", sData.question);
  mainArea.innerHTML = htmlPrint;
}
function answerQuiz(e) {
  let questionBoxes = document.querySelectorAll(".questionBox");
  questionBoxes.forEach((div) => {
    if (div == e) {
      if (div.dataset.truthcheck == "true") {
        div.classList.add("correctAnswer");
      } else {
        div.classList.add("wrongAnswer");
      }
    } else {
      div.classList.add("greyAnswer");
    }
    if (div.dataset.truthcheck == "true") {
      div.classList.add("correctAnswer");
    }
  });
}
