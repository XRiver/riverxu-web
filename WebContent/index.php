<?php
	header("Content-type: text/html; charset=utf-8");
?>
<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="X-UA-Compatible" content="IE=Edge">
		<title>RiverXu个人主页</title>
		<link rel="stylesheet" href="css/index.css" type="text/css" />
		<script src="<?php include($_SERVER["DOCUMENT_ROOT"]."/WEB-INF/php-lib/jquery-cdn.php") ?>"></script>
		<script src="js/index.js"></script>	
	</head>
	
	<body>
		<header>
			<h1>RiverXu个人主页<sub>暂时仅为博客</sub></h1>
		</header>	
		<hr />
		
		<!-- 主体部分，会分为左右两部分，分别为索引与正文   -->
		<aside class="NavSideBar"><!--索引-->
			<h2>没有用的索引</h2>
			<nav>
				<h3>内容丰富的列表</h3>
				<ul>
					<li>条目一</li>
					<li>条目二</li>
					<li>条目三</li>
				</ul>
				<h3>又一个内容丰富的列表</h3>
				<ul>
					<li>如法炮制的条目一</li>
					<li>如法炮制的条目二</li>
					<li>如法炮制的条目三</li>
				</ul>
			</nav>
		</aside>

		<main>
		<article class="Content"><!-- 正文 -->
		<h2><a href="http://riverxu.cn/blog-dev">开发中的博客</a></h2>
		<input id="roller" type="button" value="Roll" onclick="rollDie()" />
        <div id="die"></div>
        <form id="nameAnalysisForm" action="/index.php" method="POST">
        	<p>你的名字是？<input type="text" name="name" id="nameInputArea" /></p>
        	<input type="button" value="提交" onclick="nameAnalysis('submit')" />
        	<input type="button" value="Download DefectType.pdf" onclick="nameAnalysis('download')" />
        </form>
		<br>
		<form id="tryRedirectForm" action="/index.php" method="GET">
			<input id="action" type="hidden" value="false" />
			<input type="button" value="tryRedirect" onclick="tryRedirect()" />
		</form>
        <audio src="resource/music/我が栄光.mp3" preload="meta" controls>Your browser dosen't support audio label</audio>
		<span id="name_response"></span>
		</article>
		</main>
	<!-- 备案信息 -->

		<?php
		include($_SERVER["DOCUMENT_ROOT"]."/footer.php");
		?>

	</body>
</html>