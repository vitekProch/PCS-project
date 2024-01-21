let crateArticleModal = document.getElementById("create-article-modal");
let editArticlemodal = document.getElementById("edit-article-modal")
let denyArticlemodal = document.getElementById("deny-article-modal");

function showArticleCreateModal() {
  crateArticleModal.style.display = "flex";
}


function showArticleDenyModal() {
  denyArticlemodal.style.display = "flex";
}

window.onclick = function (event) {
  if (event.target == crateArticleModal) {
    crateArticleModal.style.display = "none";
  }

  if (event.target == editArticlemodal) {
    editArticlemodal.style.display = "none";
  }

  if (event.target == denyArticlemodal) {
    denyArticlemodal.style.display = "none";
  }
}