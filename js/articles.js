let articles = document.getElementsByClassName("edit-article");
for (let article of articles) {
    article.addEventListener("click", function(){
        $.ajax({
            method: "POST",
            url: "http://localhost/projekty/PCS2023/PCS-project/articles/fill-edit-article",
            data: {
                'article_edit' : true,
                'article_id': this.getAttribute('article_id'),
            },
            success: function (response) {
                let $data = JSON.parse(response);
                let fileName = $data.article_image;
                const myFile = new File(['Hello World!'], fileName, {
                    type: 'text/plain',
                    lastModified: new Date(),
                });
        
                const dataTransfer = new DataTransfer();
                dataTransfer.items.add(myFile);

                document.getElementById("article_id_value_edit").value = $data.id;
                document.getElementById("edit_article_title").value = $data.title;
                document.getElementById("edit_article_subtitle").value = $data.subtitle;
                document.getElementById("edit_article_img").files = dataTransfer.files;
                document.getElementById("edit_article_text").value = $data.article_content;
                document.getElementById("edit-article-modal").style.display = "flex";
            }
        })
    })
}
