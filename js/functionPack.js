
export function activeAfterClick(mainElement) {
  for (let i = 0; i < mainElement.length; i++) {
    mainElement[i].addEventListener("click", function() {
      for (let j = 0; j < mainElement.length; j++) {
          mainElement[j].className = mainElement[0].className.replace(" active", "");
      }
    this.className += " active";
    });
  }
}