<%@ page language="java" contentType="text/html; charset=UTF-8"
    pageEncoding="UTF-8"%>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Analysis of your name</title>
</head>
<body>
	<p>
	<%   String name = request.getParameter("name");
		 String answer = (String) request.getAttribute("answer");
		 out.print("Your name is "+name+".<br>");
		 if (answer == null) {
		 	out.print("Cannot get a answer.<br>");
		 } else {
		 	out.print("The analysis is "+answer+".<br>");
		 }

		 
		
	%>
	</p>
</body>
</html>