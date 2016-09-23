<?php

    function can_del_article($priv) {
        return $priv == "admin";
    }


    include($_SERVER["DOCUMENT_ROOT"]."/WEB-INF/php-lib/mysql.php");
    include($_SERVER["DOCUMENT_ROOT"]."/WEB-INF/php-lib/blog-verification.php");
    include($_SERVER["DOCUMENT_ROOT"]."/WEB-INF/php-lib/blog-article-management.php"); 
    
    session_start();

    $id = $_POST["tid"];

    if (empty($id)) {
        echo "E01";
        exit;
    }

    $conn = get_mysql_conn();
    select_webdb();

    $privilege = lookup_sid(session_id());

    if (can_del_article($privilege)) {

    } else { //Privilege failure handling

    }


    

?>