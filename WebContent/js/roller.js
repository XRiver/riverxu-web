
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

document.getElementById("roller").onclick = function() {
	document.getElementById("die").innerHTML = "&#x268" + Math.floor(Math.random()*6)+";";
}
