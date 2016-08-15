<%@ page language="java" import="java.util.*" contentType="text/html; charset=UTF-8"
    pageEncoding="UTF-8"%>
<!DOCTYPE html>
<html>
	<head>
		<title>RiverXu个人主页</title>
		<link rel="stylesheet" href="css/index.css" type="text/css" />
	</head>
	
	<body>
		<div id="header">
			<h1>RiverXu个人主页<sub>暂时仅为博客</sub></h1>
		</div>	
		<!-- 此处应有导航栏 -->
		<hr />
		
		<!-- 主体部分，会分为左右两部分，分别为索引与正文   -->
		<p>
		<% javax.servlet.http.Cookie[] cookies = request.getCookies();
			for (javax.servlet.http.Cookie c : cookies) {
				out.println(c.getName()+':'+c.getValue());
				if (c.getName().equals("is_admin")) {
					if (c.getValue().equals("true")) {
						out.println("Welcome, admin!");
					} else {
						out.println("You are visiting as a guest.");
					}
				}
			}
		 %>
			</p>
		<p>服务器启动时间：<%= application.getAttribute("init-date") %></p>
		<p>服务器当前时间：<%= new Date() %></p>
		<p>网站功能正在开发中，没事可以点点下面的按钮，检测血统。</p>
		<div><input id="roller" type="button" value="Roll" /></div>
        <div id="die"></div>
        <script src="js/roller.js"></script>
        <form id="nameAnalysisForm" action="/api/first.do" method="POST">
        	<p>你的名字是？<input type="text" name="name" /></p>
        	<input type="hidden" name="action" value="none" /> 
        	<input type="button" value="提交" onclick="nameAnalysis('submit')" />
        	<input type="button" value="Download as file" onclick="nameAnalysis('download')" />
        </form>
        
	</body>
	
	
	<!-- 备案信息 -->
	<hr />
	<footer>
		<p align="center">网站备案号：<a href="http://www.miitbeian.gov.cn/">鲁ICP备16026714号</a></p>
		<p align="center">联系我:
			<a href="mailto:sdxujianghe@126.com">
				<img alt="e-mail" src="img/e-mail.png" border="0" width="32px" height="32px" />
			</a>
		</p>
	</footer>
</html>