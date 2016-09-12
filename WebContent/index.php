<!DOCTYPE html>
<html>
	<head>
		<?php
			header("Content-type: text/html; charset=utf-8");
		?>
		<meta http-equiv="X-UA-Compatible" content="IE=Edge">
		<title>RiverXu个人主页</title>
		<link rel="stylesheet" href="css/index.css" type="text/css" />
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
		<h2>正文：网站功能正在开发中，没事可以点点下面的按钮，检测血统。</h2>
		<input id="roller" type="button" value="Roll" onclick="rollDie()" />
        <div id="die"></div>
        <script src="js/roller.js"></script>
        <form id="nameAnalysisForm" action="/index.php" method="POST">
        	<p>你的名字是？<input type="text" name="name" /></p>
        	<input type="hidden" name="action" value="none" /> 
        	<input type="button" value="提交" onclick="nameAnalysis('submit')" />
        	<input type="button" value="Download DefectType.pdf" onclick="nameAnalysis('download')" />
        </form>
		<br>
		<form id="tryRedirectForm" action="/index.php" method="GET">
			<input id="action" type="hidden" value="false" />
			<input type="button" value="tryRedirect" onclick="tryRedirect()" />
		</form>
        <audio src="resource/music/我が栄光.mp3" preload="meta" controls>Your browser dosen't support audio label</audio>
	

	<?php 

	function br() {
		echo "<br>";
	}

	function str_starts_with($haystack, $needle) {
    	return substr($haystack, 0, strlen($needle)) === $needle;
  	}

	  session_start();

    if (!empty($_POST["name"])) {
        $name = $_POST["name"];
		$family_name = $name[0].$name[1].$name[2];
		echo "你的姓氏为".$family_name;
		br();
		echo "输入长度（PHP中的字节数）为".strlen($name);
		br();
		echo "输入内容为".$name;
		br();
		echo "汉字“徐”在PHP string中的长度为：".strlen("徐");
		br();
        $result = str_starts_with($name,"徐")?"你是徐家人":"你不是徐家人";
        if ($_POST["action"]=="submit") {
            echo "生成结果:".$result;
			include("test/exp.php");
        } else {
			header("Location: http://riverxu.cn/test/file_return.php");
			exit();
        }
    } elseif ($_GET["action"]=="true") {
		include("test/redirect.php");// Invalid.
	} else {
        echo "未检测到输入。";
    }

	?>
		</article>
		</main>
	<!-- 备案信息 -->
	<hr>
	<footer>
		<p>网站备案号：<a href="http://www.miitbeian.gov.cn/">鲁ICP备16026714号</a></p>
		<p>联系我:
			<img onclick="sendEmail()" alt="e-mail" src="img/e-mail.png" border="0" width="32" height="32" />
			<br>
			<small><s>没有什么最终解释权归属问题。</s></small>
		</p>
	</footer>

	</body>
</html>