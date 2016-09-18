var xmlHttp;

function uploadArticle() {
    var title = document.getElementById("title-input").value;
    var content = document.getElementById("content-input").value;

    if (title!==""&&content!=="") {
        xmlHttp = GetXmlHttpObject();
        xmlHttp.onreadystatechange = handleUploadResponse;
        xmlHttp.open("POST","api/add-article.php",true);
        xmlHttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
	    xmlHttp.send("title="+title+"&content="+content);
    } else {
        alert("怎么没有内容？！");
    }
}

function handleUploadResponse() {
    if (xmlHttp.readyState==4 && xmlHttp.status==200) {
		//Stub implementation.
        alert("Message from server:"+xmlHttp.responseText);
	}
}