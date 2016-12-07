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

function rollDie() {
	document.getElementById("die").innerHTML = "&#x268" + Math.floor(Math.random()*6)+";";
}

function updateNameInfo() {
	if (xmlHttp.readyState==4 && xmlHttp.status==200) {
		document.getElementById("name_response").innerHTML = xmlHttp.responseText;
	}

}