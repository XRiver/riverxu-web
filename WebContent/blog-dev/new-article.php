<?php
    header("Content-type: text/html; charset=utf-8");
?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="X-UA-Compatible" content="IE=Edge">
        <title>添加一篇新文章</title>
        <script src="/js/ajax_h.js"></script>
        <script src="/js/blog-dev/new-article.js"></script>
    </head>
    <body>
        <form class="article-input-form" id="article-input-form" action="javascript:uploadArticle()">
            <p>标题：<input id="title-input" type="text" placeholder="Input title here..." required></p>
            <p>正文：<textarea id="content-input" placeholder="Insert your content here..." rows=15 cols=30 required></textarea></p>
            <input id="submit" type="submit" value="提交">
        </form>
        <?php
            include($_SERVER["DOCUMENT_ROOT"]."/footer.php");
        ?>
    </body>
</html>