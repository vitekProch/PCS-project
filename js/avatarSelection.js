let avatars = document.getElementsByClassName("radio_avatar");

for (let avatar of avatars) {
    avatar.addEventListener("click", function () {
        $.ajax({
            method: "POST",
            url: "http://localhost" + BASE_PATH + "user/change-avatar",
            data: {
                'avatar_img': this.value,
            },
            success: function (response) {
                let newAvatar = "/projekty/PCS2023/PCS-project/images/avatars/" + response;
                document.getElementById("user_page_avatar").setAttribute("src", newAvatar);
                document.getElementById("avatar_user_menu").setAttribute("src", newAvatar);
            },
            error: function (error) {
                console.error("Chyba při požadavku: ", error);
            }
        });
    });
}
