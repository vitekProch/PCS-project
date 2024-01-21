let avatars = document.getElementsByClassName("radio_avatar");

for (let avatar of avatars) {
    avatar.addEventListener("click", function () {
        $.ajax({
            method: "POST",
            url: "http://localhost/projekty/PCS2023/PCS-project/user/change-avatar",
            data: {
                'avatar_img': this.value,
            },
            success: function (response) {
                // Vytvořte nový obrázek
                let newAvatar = "/projekty/PCS2023/PCS-project/images/avatars/" + response;

                // Nastavte nový obrázek jako atribut src
                document.getElementById("user_page_avatar").setAttribute("src", newAvatar);
                document.getElementById("avatar_user_menu").setAttribute("src", newAvatar);
            },
            error: function (error) {
                console.error("Chyba při požadavku: ", error);
            }
        });
    });
}
