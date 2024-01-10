let userMenu = document.getElementById("user-menu");
let userMenuDropdown = document.getElementById("user-menu-dropdown");

userMenu.addEventListener("click", function(){
    if(userMenuDropdown.style.display === "block") {
        userMenuDropdown.style.display = "none";
        userMenu.style.borderBottomLeftRadius = "14px";
        userMenu.style.borderBottomRightRadius = "14px";
        userMenu.style.borderBottom = "2px solid var(--secondary)";
    }
    else {
        userMenuDropdown.style.display = "block";
        userMenu.style.borderBottomLeftRadius = 0;
        userMenu.style.borderBottomRightRadius = 0;
        userMenu.style.borderBottom = "0";
    }
});
