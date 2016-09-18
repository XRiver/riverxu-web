var xmlHttp;

function uploadArticle() {
    var title = document.getElementById("title-input").value;
    var content = document.getElementById("content-input").value;

    if (!title===""&&!content==="") {
        xmlHttp = 
    } else {
        alert("怎么没有内容？！");
    }
}