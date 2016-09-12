<?php 

	function br() {
		echo "<br>";
	}

	function str_starts_with($haystack, $needle) {
    	return substr($haystack, 0, strlen($needle)) === $needle;
  	}

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
    } elseif ($_GET["action"]=="true") {
		include("test/redirect.php");// Invalid.
	} else {
        echo "未检测到输入。";
    }

	?>