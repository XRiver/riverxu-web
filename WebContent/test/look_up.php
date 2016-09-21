<?php

    include($_SERVER["DOCUMENT_ROOT"]."/WEB-INF/php-lib/mysql.php");
    include($_SERVER["DOCUMENT_ROOT"]."/WEB-INF/php-lib/blog-verification.php");


    session_start();
    $c = get_mysql_conn();
    select_webdb();


    $privilege = lookup_sid(session_id());
    echo $privilege;
    close_mysql($c);

?>