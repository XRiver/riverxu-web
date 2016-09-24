<?php

    include($_SERVER["DOCUMENT_ROOT"]."/WEB-INF/php-lib/mysql.php");
    include($_SERVER["DOCUMENT_ROOT"]."/WEB-INF/php-lib/blog-verification.php");
    include($_SERVER["DOCUMENT_ROOT"]."/WEB-INF/php-lib/blog-article-management.php"); 
    
    session_start();


    $title = $_POST["title"];
    $content = $_POST["content"];

    if (empty($title)||empty($content)) {
        echo "E01"; // Title & content can't be empty!
        exit;
    }

    $conn = get_mysql_conn();
    select_webdb();

    $privilege = lookup_sid(session_id());

    if ($privilege=="admin") {
        $id = intval(addArticle($title,$content));
        if (-1 != $id) {
            echo $id;
        } else {
            echo "E02"; //Internal error! Cannot upload an article.
        }
        
    } else {
        if ($privilege=="overtime") {
            echo "E03";  //Login overtime! Try login again
        } else {
             echo "E04";  //You don't have the admin privilege to upload an article! Or you can try login again.
        }
    }

    close_mysql($conn);


?>