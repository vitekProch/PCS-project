import { activeAfterClick } from './functionPack.js';

const MAX_NAME_LENGTH = 17;

// <----------- AVATAR SELECT FUNKČNÍ ----------->
if (document.getElementById("avatar-selection")){
  let avataractiveAfterClick = document.getElementById("avatar-selection");
  let avatars = avataractiveAfterClick.getElementsByClassName("avatar__image");
  activeAfterClick(avatars);
}

function userNameValidation(element) {
  let parent = element.parentElement;

  if (element.value.length <= 0) {
    return createErrorMessage(element, parent, `Prosím vyplňte: ${element.placeholder}`);
  }

  if (element.value.length > MAX_NAME_LENGTH) {
    return createErrorMessage(element, parent, `Maximalní počet znaků je ${MAX_NAME_LENGTH}.`);
  }

  return deleteErrorMessage(element, parent);
}


function emailValidation(element) {
  let parent = element.parentElement;
  console.log(parent.parentElement.parentElement.children[2]);
  if (element.value.length <= 0) {
    return createErrorMessage(element, parent, `Prosím vyplňte: ${element.placeholder}`)
  }

  if (!element.value.includes("@") || !element.value.includes(".")) {
    return createErrorMessage(element, parent, "Toto není validní email");
  }

  return deleteErrorMessage(element, parent);
}


function passwordValidation(element) {
  let parent = element.parentElement;
  let checkPassword = document.getElementById("check-password");


  if (element.value.length <= 0) {
    return createErrorMessage(element, parent, `Prosím vyplňte: ${element.placeholder}`)
  }

  if(checkPassword.value === element.value) {
    deleteErrorMessage(checkPassword, checkPassword.parentElement);
  }

  return deleteErrorMessage(element, parent);
}

function passwordCheckValidation(element) {
  let parent = element.parentElement;
  let password = document.getElementById("create-password");


  if (element.value.length <= 0) {
    return createErrorMessage(element, parent, `Prosím vyplňte: ${element.placeholder}`)
  }

  if(password.value !== element.value) {
    return createErrorMessage(element, parent, "Hesla se neshodují!")
  }

  return deleteErrorMessage(element, parent);
}

function createErrorMessage(element, parent, messageText) {
  deleteErrorMessage(element, parent);
  disableSubmitBtn();
  if (parent.children[2] === undefined) {
    let paragraph = document.createElement("p");
    paragraph.appendChild(document.createTextNode(messageText));
    paragraph.className = "form__error-message";
    parent.append(paragraph);
    element.classList.add("input--error");
    return
  }

  return
}

function showUserEditButtons(element) {
  let parent = element.parentElement;
  parent.getElementsByClassName("edit")[0].style.display = "none";
  parent.getElementsByClassName("cross")[0].style.display = "block";
  parent.getElementsByClassName("accept")[0].style.display = "block";
  parent.getElementsByTagName("input")[0].removeAttribute("readonly");
}

function hideUserEditButtons(element) {
  let parent = element.parentElement;
  parent.getElementsByClassName("edit")[0].style.display = "block";
  parent.getElementsByClassName("cross")[0].style.display = "none";
  parent.getElementsByClassName("accept")[0].style.display = "none";
  parent.getElementsByTagName("input")[0].setAttribute("readonly", true);
}



function deleteErrorMessage(element, parent) {
  activeSubmitBtn();
  if(parent.children[2] !== undefined){
    parent.children[2].remove();
    element.classList.remove("input--error");
  }
}

function disableSubmitBtn() {
  let submitBtn = document.querySelector('[type="submit"]');
  submitBtn.classList.add("disable");
}

function activeSubmitBtn() {
  let submitBtn = document.querySelector('[type="submit"]');
  submitBtn.classList.remove("disable");
}