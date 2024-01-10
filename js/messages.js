// <----------- MESSAGE NAV FUNKČNÍ ----------->
let messagesNavMenu = document.getElementById("messages-nav__menu");
let messagesNavList = messagesNavMenu.getElementsByClassName("messages-nav__list");
let currentNotification = document.getElementsByClassName("message-notification");

for (let i = 0; i < messagesNavList.length; i++) {
  messagesNavList[i].addEventListener("click", function() {
    for (let j = 0; j < messagesNavList.length; j++) {
        messagesNavList[j].className = messagesNavList[0].className.replace(" active", "");
    }
  currentNotification[i].style.display = "none";
  this.className += " active";
  });
}
