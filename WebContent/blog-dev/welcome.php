<?php
    header("Content-type: text/html; charset=utf-8");
    session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <title>River Xu's blog</title>
    <script src="<?php include($_SERVER["DOCUMENT_ROOT"]."/WEB-INF/php-lib/jquery-cdn.php") ?>"></script>
    <script src="/js/md5-min.js"></script>
    <script src="/js/cookies.js"></script>
    <script src="/js/blog-dev/welcome.js"></script>
</head>

<body>
    <header class="header">
        <div class="header-title">Welcome to River Xu's blog!</div>
        <div id="split-line" />
        <div class="login" id="login-module">
        <form id="login-form" action="javascript:tryLogin();" >
            用户名:<input id="username-input" type="text" name="username" required /><br>
            密码：<input id="password-input" type="password" name="password" required /><br>
            <input id="try-login" type="submit" value="登录" >
        </form>
    </header>
    <aside id="article-module-index"><!--文章模块索引，待完成，可以根据模块数目写为静态内容-->
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
    <div id="article-index">
        <?php
            include($_SERVER["DOCUMENT_ROOT"]."/WEB-INF/php-lib/mysql.php");
            include($_SERVER["DOCUMENT_ROOT"] ."/WEB-INF/php-lib/blog/blog-article-management.php");
            include($_SERVER["DOCUMENT_ROOT"] ."/WEB-INF/php-lib/blog/blog-verification.php");
            include_once($_SERVER['DOCUMENT_ROOT']."/WEB-INF/php-lib/blog/model/Article.php");
            include_once($_SERVER['DOCUMENT_ROOT']."/WEB-INF/php-lib/blog/model/MetaArticle.php");

            $conn = get_mysql_conn();
            select_webdb();

            $list = getArticleList();

            foreach ($list as $meta_article) {
        ?>

        <div class="article-index-item">
            <div class="article-title">
            <?php echo '<a href="/blog-dev/view-article.php?id='.$meta_article->getId().'">'.htmlspecialchars($meta_article->getTitle()).'</a>';  ?>
            </div>
            <div class="article-summary">文章<?php echo $meta_article->getId();  ?>简介</div>
            <div class="article-lable-list">文章关键词：
                <span class="article-lable">JS</div>, <span class="article-lable">CSS</div>
            </div>
            <?php echo '<input class="delButton" type="button" onclick="tryDel('.$meta_article->getId().')" value="Delete" style="display:none" />' ?>
        </div>
        <?php
            }
        ?>
    </div>

    <?php
        include($_SERVER["DOCUMENT_ROOT"]."/footer.php");
    ?>

    <?php
        $sessionid = session_id();
        $user = lookup_sid($sessionid);
        $user_privilege = $user->getPrivilege();

        echo <<<EOF
        <script> $(document).ready(function () {

EOF;

        if ($user_privilege=="admin") {
            echo 'setAdminUI();';
        } else if ($user_privilege=="overtime") {
            echo 'alert("您之前的登陆已经过期");';
        } else {
            echo '//'.$sessionid."----".$user_privilege;
        }

        echo <<<EOF
        
        });</script>
EOF;
        close_mysql($conn);

    ?>

    </body>
</html>