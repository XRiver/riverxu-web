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
    if (!empty($_POST["name"])) {
        $name = mb_convert_encoding($_POST["name"],"utf-8","ascii");
		$family_name = $name[0];
		echo "你的姓氏为".$family_name;
		echo "输入长度为".strlen($name);
		echo "输入内容为".$name;
        $result = $family_name=='徐'?"你是徐家人":"你不是徐家人";
        if ($_POST["action"]=="submit") {
            echo @"生成结果:
            ".$result;
        } else {
            echo @"现在暂时不支持下载文件，而".$result;
        }
    } else {
        echo "未检测到输入。";
    }
?>
    