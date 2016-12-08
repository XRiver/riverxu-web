function uploadArticle() {
    var title = document.getElementById("title-input").value;
    var content = document.getElementById("content-input").value;

    if (title!==""&&content!=="") {
        $.ajax({
            url:"api/add-article.php" ,
            type:"POST",
            complete:handleUploadResponse,
            contentType:"application/x-www-form-urlencoded",
            data: {
                title:title,
                content:content
            }
        });
    } else {
        alert("怎么没有内容？！");
    }
}

function handleUploadResponse(jqx,textStatus) {
    if (textStatus=="success") {
        alert("文章序号"+jqx.responseText);
	} else {
	    alert("AJAX request failure...");
    }
}