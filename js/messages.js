// <----------- MESSAGE NAV FUNKČNÍ ----------->
const messagesNavbarToggle = document.getElementById("messages-nav-toggler");
const messagesNavbarMenu = document.querySelector("#messages-nav");
const messagesNavbarLinksContainer = document.getElementById("messages-nav__menu");
let isMessageNavbarExpanded = messagesNavbarToggle.getAttribute("aria-expanded") === "true";

const toggleMessageNavbarVisibility = () => {
  isMessageNavbarExpanded = !isMessageNavbarExpanded;
  messagesNavbarToggle.setAttribute("aria-expanded", isMessageNavbarExpanded);
  messagesNavbarToggle.classList.toggle("collapsed");
};
 
messagesNavbarToggle.addEventListener("click", toggleMessageNavbarVisibility);
messagesNavbarLinksContainer.addEventListener("click", (e) => e.stopPropagation());
messagesNavbarMenu.addEventListener("click", toggleMessageNavbarVisibility);