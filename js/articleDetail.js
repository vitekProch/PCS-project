let like = document.getElementById("like");
let likeActive = document.getElementById("like-active");

like.addEventListener("click", function(){
    like.style.display = "none";
    likeActive.style.display = "block";
});

likeActive.addEventListener("click", function(){
    likeActive.style.display = "none";
    like.style.display = "block";
});