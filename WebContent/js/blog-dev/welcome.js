
function tryLogin() {

    var username = document.getElementById("username-input").value;
    var password = document.getElementById("password-input").value;

    $.ajax({
        url:"api/login.php",
        type:"POST",
        complete:handleLoginResponse,
        contentType:"application/x-www-form-urlencoded",
        data: {
            username:username,
            password:hex_md5(password)
        }
    })
}

function handleLoginResponse(xhr,textStatus) {
    if (textStatus=="success") {
		var response = xhr.responseText;
        switch(response) {
            case "admin":setAdminUI();break;
            case "invalid":
            default:alert("您的登录信息有误，现在仅能以访客身份查看文章，请重新登录。");break;
        }
	} else {
	    alert("FAILURE");
    }
}

function tryDel(id) {
    $.ajax({
        url:"api/del-article.php",
        type:"POST",
        contentType:"application/x-www-form-urlencoded",
        complete:handleDelResponse,
        data:{
            id:id
        }
    })
}


function handleDelResponse(xhr,textStatus) {
    if (textStatus=="success") {
		var response = xhr.responseText;
        if (response.charAt(0)=='E') {
            switch(response) {//dummy
                default: alert("Error!");
            }
        } else {
            alert("Successfully deleted:"+response);
        }
	}
}

function setAdminUI() {
    setAdminLoginArea();
    makeDelVisible();
}

function makeDelVisible() {
    var list = document.getElementsByClassName("delButton");
    for (var i=0;i<list.length;i++) {
        list[i].style.display = "inline";
    }

}

function setAdminLoginArea() {
    document.getElementById("login-module").innerHTML=
            "您已经以管理员身份登录。<br><a href=\"/blog-dev/new-article.php\">前往编写文章</a>";
}