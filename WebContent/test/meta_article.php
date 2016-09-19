<?php
    include($_SERVER["DOCUMENT_ROOT"]."/WEB-INF/php-lib/mysql.php");
    include($_SERVER["DOCUMENT_ROOT"]."/WEB-INF/php-lib/blog-article-management.php");
            
    $conn = get_mysql_conn();
    select_webdb();

    print_r(getArticleList());

    close_mysql($conn);
?>