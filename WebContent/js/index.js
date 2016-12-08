function nameAnalysis(action) {
	$.ajax({
        url:"name_response.php",
        type:"POST",
        complete:updateNameInfo,
        contentType:"application/x-www-form-urlencoded",
        data:{
            action:action,
            name:document.getElementById("nameInputArea").value
        }
	});
}

function tryRedirect() {
	var form = document.getElementById("tryRedirectForm");
    form.action.value = "true";
	form.submit();
}

function rollDie() {
    $("#die").html("&#x268" + Math.floor(Math.random()*6)+";");
}

function updateNameInfo(jqXHR,textStatus) {
	if (textStatus=="success") {
		$("#name_response").html(jqXHR.responseText);
	} else {
	    alert("AJAX request failure...");
    }
}