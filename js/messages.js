const messagesNavbarToggle = document.getElementById("messages-nav-toggler");
const messagesNavbarMenu = document.getElementById("messages-nav");
let isMessageNavbarExpanded = messagesNavbarToggle.getAttribute("aria-expanded") === "true";

const toggleMessageNavbarVisibility = () => {
  isMessageNavbarExpanded = !isMessageNavbarExpanded;
  messagesNavbarToggle.setAttribute("aria-expanded", isMessageNavbarExpanded.toString());
  updateNavbarVisibility();
  messagesNavbarToggle.classList.toggle("collapsed");
};

const updateNavbarVisibility = () => {
  if (window.innerWidth <= 400) {
    messagesNavbarMenu.style.display = isMessageNavbarExpanded ? "block" : "none";
  } else {
    messagesNavbarMenu.style.display = "block";
  }
};

messagesNavbarToggle.addEventListener("click", toggleMessageNavbarVisibility);

window.addEventListener("resize", () => {
  updateNavbarVisibility();
});

updateNavbarVisibility();