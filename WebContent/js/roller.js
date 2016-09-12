function GetXmlHttpObject() { //暂时先把函数搬过来，之后再尝试import
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

function nameAnalysis(action) {
	//改为AJAX实现
	//var myForm = document.getElementById("nameAnalysisForm");
	//myForm.action.value=action;
	//myForm.submit();

	xmlHttp = GetXmlHttpObject();
	xmlHttp.onreadystatechange = updateNameInfo;
	xmlHttp.open("POST","name_response.asp",true);
	xmlHttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
	xmlHttp.send("action="+action);

}

function tryRedirect() {
	var form = document.getElementById("tryRedirectForm");
    form.action.value = "true";
	form.submit();
}

function sendEmail() {
	window.open("mailto:sdxujianghe@126.com");
}

function rollDie() {
	document.getElementById("die").innerHTML = "&#x268" + Math.floor(Math.random()*6)+";";
}

function updateNameInfo() {
	if (xmlhttp.readyState==4 && xmlhttp.status==200) {
		document.getElementById("name_response").innerHTML = xmlHttp.responseText;
	}

}