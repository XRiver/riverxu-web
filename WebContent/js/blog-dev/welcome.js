var xmlHttp;

function tryLogin() {
    xmlHttp = GetXmlHttpObject();

    var username = document.getElementById("username-input").value;
    var password = document.getElementById("password-input").value;

    xmlHttp.onreadystatechange = handleLoginResponse;
    xmlHttp.open("POST","api/login.php",true);
	xmlHttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
	xmlHttp.send("username="+username+"&password="+hex_md5(password));
}

function handleLoginResponse() {
    if (xmlHttp.readyState==4 && xmlHttp.status==200) {
		var response = xmlHttp.responseText;
        switch(response) {
            case "admin":setAdminUI();break;
            case "invalid":
            default:alert("您的登录信息有误，现在仅能以访客身份查看文章，请重新登录。");break;
        }
	}
}

function tryDel(id) {
    xmlHttp = GetXmlHttpObject();

    xmlHttp.onreadystatechange = handleDelResponse;
    xmlHttp.open("POST","api/del-article.php",true);
	xmlHttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
	xmlHttp.send("id="+id);
}


function handleDelResponse() {
    if (xmlHttp.readyState==4 && xmlHttp.status==200) {
		var response = xmlHttp.responseText;
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
    alert("登陆成功！");
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


var granted = getCookie("privilege");

if (granted) {
    if (granted=="admin") {
        setAdminUI();
    }
}