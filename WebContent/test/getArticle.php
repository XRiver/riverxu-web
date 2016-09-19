<?php

    include($_SERVER["DOCUMENT_ROOT"]."/WEB-INF/php-lib/mysql.php");
    include($_SERVER["DOCUMENT_ROOT"]."/WEB-INF/php-lib/blog-article-management.php");
            
    $conn = get_mysql_conn();
    select_webdb();

    $article = getArticle(intval($_GET["id"]));
    echo "Title:".$article->getTitle()."Content:".$article->getContent();

    close_mysql($conn);
?>