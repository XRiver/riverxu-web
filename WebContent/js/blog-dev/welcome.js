function GetXmlHttpObject() { //Simply copy the function, try "import" feature later.
    var xmlHttp = null;

    try {
        // Firefox, Opera 8.0+, Safari
        xmlHttp = new XMLHttpRequest();
    }
    catch (e) {
        // Internet Explorer
        try {
            xmlHttp = new ActiveXObject("Msxml2.XMLHTTP");
        }
        catch (e) {
            xmlHttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
    }
    return xmlHttp;
}


var xmlHttp;

function tryLogin() {
    xmlHttp = GetXmlHttpObject();

    var username = document.getElementById("username_input").value;
    var password = document.getElementById("password-input").value;

    xmlHttp.onreadystatechange = loginRequestHandle;
    xmlHttp.open("POST","api/login.php",true);
	xmlHttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
	xmlHttp.send("username="+username+"&password="+password);
}

function loginRequestHandle() {
    if (xmlHttp.readyState==4 && xmlHttp.status==200) {
		var response = xmlHttp.responseText;
        switch(response) {
            case "admin":document.getElementById("login-module").innerHTML="您已经以管理员身份登录。";
                alert("登陆成功！");
                break;
            case "guest":
            case "invalid":
            default:alert("您的登录信息有误，现在仅能以访客身份查看文章，请重新登录。");break;
        }
	}
}