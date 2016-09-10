
function nameAnalysis(action) {
	var myForm = document.getElementById("nameAnalysisForm");
	myForm.action.value=action;
	myForm.submit();
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

