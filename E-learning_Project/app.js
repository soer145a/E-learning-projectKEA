console.log("X");
let mainArea = document.querySelector("#divInjectContentHere");
let infoHTMLBackup;
let placement = 1;
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
  
  if (document.getElementById(stringDivName).classList.contains("show"))  {
    
    document.getElementById(stringDivName).classList.remove("show");
  }
  else {
    document.getElementById(stringDivName).classList.add("show");
  }
}
async function fetchIntroduction(ID) {
  console.log("FETCH INTRODUCTION ON COURSE" + ID);
  placement = ID * 1 + 1;
  console.log(placement);
  let connection = await fetch(
    `APIs/API-fetch-introductions.php?courseID=${ID}`
  );
  let sData = await connection.json();
  console.log(sData);
  let htmlBluePrintIntroduction = await fetch(
    `blueprints/IntroductionHTMLElement.php`
  );
  let introductionHtml = await htmlBluePrintIntroduction.text();
  let htmlPrint = introductionHtml.replace("::insertp1::", sData.para1);
  htmlPrint = htmlPrint.replace("::insertp2::", sData.para2);
  htmlPrint = htmlPrint.replace("::insertp3::", sData.para3);
  htmlPrint = htmlPrint.replace("::insertp4::", sData.para4);
  mainArea.innerHTML = htmlPrint;
}
async function fetchExample(ID) {
  console.log("FETCH EXAMPLE ON COURSE" + ID);

  let connection = await fetch(`APIs/API-fetch-examples.php?courseID=${ID}`);
  let sData = await connection.json();
  console.log(sData);
  let htmlBluePrintExample = await fetch(`blueprints/exampleHTMLElement.php`);
  let exampleHtml = await htmlBluePrintExample.text();
  htmlPrint = exampleHtml.replace(
    "::example_headline1::",
    sData.example_headline1
  );
  htmlPrint = htmlPrint.replace(
    "::example_headline2::",
    sData.example_headline2
  );
  htmlPrint = htmlPrint.replace("::example_image1::", sData.example_image1);
  htmlPrint = htmlPrint.replace("::example_image2::", sData.example_image2);
  htmlPrint = htmlPrint.replace(
    "::example_explanation::",
    sData.example_explanation
  );

  mainArea.innerHTML = htmlPrint;
}
async function fetchSummery(ID) {
  console.log("FETCH SUMMERY ON COURSE" + ID);
  placement = ID * 3 + 1;
  let connection = await fetch(`APIs/API-fetch-summery.php?courseID=${ID}`);
  let sData = await connection.json();
  console.log(sData);
  let htmlBluePrintSummery = await fetch(`blueprints/summeryHTMLElement.php`);
  let summeryHtml = await htmlBluePrintSummery.text();
  let htmlPrint = summeryHtml.replace("::information::", sData.information);
  htmlPrint = htmlPrint.replace("::summery_image1::", sData.summery_image1);
  htmlPrint = htmlPrint.replace("::explanation::", sData.explanation);
  mainArea.innerHTML = htmlPrint;
}
async function fetchQuiz(ID) {
  console.log("FETCH QUIZ ON COURSE" + ID);
  placement = ID * 4 + 1;
  let connection = await fetch(`APIs/API-fetch-quiz.php?courseID=${ID}`);
  let sData = await connection.json();
  let htmlBluePrintQuiz = await fetch(`blueprints/quizHTMLElement.php`);
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
let firstPage = mainArea.innerHTML;
function navMovementHandler(direction) {
  placement = placement + direction;
  if (placement == 0) {
    placement = placement + 1;
  }
  if (placement == 1) {
    mainArea.innerHTML = firstPage;
  }
  if (placement >= 2 && placement <= 5) {
    let fakeID = 1;
    switch (placement) {
      case 2:
        fetchIntroduction(fakeID);
        break;
      case 3:
        fetchExample(fakeID);
        break;
      case 4:
        fetchSummery(fakeID);
        break;
      case 5:
        fetchQuiz(fakeID);
        break;
    }
  }
  if (placement >= 6 && placement <= 9) {
    let fakeID = 2;
    switch (placement) {
      case 6:
        fetchIntroduction(fakeID);
        break;
      case 7:
        fetchExample(fakeID);
        break;
      case 8:
        fetchSummery(fakeID);
        break;
      case 9:
        fetchQuiz(fakeID);
        break;
    }
  }
  if (placement >= 10 && placement <= 13) {
    let fakeID = 3;
    switch (placement) {
      case 10:
        fetchIntroduction(fakeID);
        break;
      case 11:
        fetchExample(fakeID);
        break;
      case 12:
        fetchSummery(fakeID);
        break;
      case 13:
        fetchQuiz(fakeID);
        break;
    }
  }
  if (placement >= 14 && placement <= 17) {
    let fakeID = 4;
    switch (placement) {
      case 14:
        fetchIntroduction(fakeID);
        break;
      case 15:
        fetchExample(fakeID);
        break;
      case 16:
        fetchSummery(fakeID);
        break;
      case 17:
        fetchQuiz(fakeID);
        break;
    }
  }
  if (placement >= 18 && placement <= 21) {
    let fakeID = 5;
    switch (placement) {
      case 18:
        fetchIntroduction(fakeID);
        break;
      case 19:
        fetchExample(fakeID);
        break;
      case 20:
        fetchSummery(fakeID);
        break;
      case 21:
        fetchQuiz(fakeID);
        break;
    }
  }
  if (placement >= 22 && placement <= 25) {
    let fakeID = 6;
    switch (placement) {
      case 22:
        fetchIntroduction(fakeID);
        break;
      case 23:
        fetchExample(fakeID);
        break;
      case 24:
        fetchSummery(fakeID);
        break;
      case 25:
        fetchQuiz(fakeID);
        break;
    }
  }
}

/* ---------------- 26-4-2020 Mikkel Start*/

function toggleNav(e) {
  //Get all elements within Nav element
  let aChildElements = e.parentElement.children;

  //Iterate through the array of child elements and reset class to empty
  for (let i = 0; i < aChildElements.length; i++) {
    aChildElements[i].classList = "";
  }

  //Add the class active to the clicked element
  e.classList = "active";
}

/* ---------------- 26-4-2020 Mikkel Slut*/
