<!DOCTYPE html>
<html>
	<head>
		<?php
			header("Content-Type:text/html");
			header("Charset=utf-8");
		?>
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
		
		<p>网站功能正在开发中，没事可以点点下面的按钮，检测血统。</p>
		<div><input id="roller" type="button" value="Roll" /></div>
        <div id="die"></div>
        <script src="js/roller.js"></script>
        <form accept-charset="utf-8" id="nameAnalysisForm" action="" method="POST">
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
        } else {
			header("Location: http://riverxu.cn/test/file_return.php");
			exit();
        }
    } else {
        echo "未检测到输入。";
    }
?>
    