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

function nameAnalysis(action) {
	//var myForm = document.getElementById("nameAnalysisForm");
	//myForm.action.value=action;
	//myForm.submit();

	xmlHttp = GetXmlHttpObject();
	xmlHttp.onreadystatechange = updateNameInfo;
	xmlHttp.open("POST","name_response.php",true);
	xmlHttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
	xmlHttp.send("action="+action+"&name="+document.getElementById("nameInputArea").value);

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
	if (xmlHttp.readyState==4 && xmlHttp.status==200) {
		document.getElementById("name_response").innerHTML = xmlHttp.responseText;
	}

}