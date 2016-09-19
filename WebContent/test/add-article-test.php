<?php
    include($_SERVER["DOCUMENT_ROOT"]."/WEB-INF/php-lib/mysql.php");
    include($_SERVER["DOCUMENT_ROOT"]."/WEB-INF/php-lib/blog-article-management.php");

    $conn = get_mysql_conn();
    select_webdb();

    $title = "Hello";
    $content = $title." World";

    echo "Id:".addArticle($title,$content);

    close_mysql($conn);


?>