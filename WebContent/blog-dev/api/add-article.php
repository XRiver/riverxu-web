<?php

    include($_SERVER["DOCUMENT_ROOT"]."/WEB-INF/php-lib/mysql.php");
    include($_SERVER["DOCUMENT_ROOT"]."/WEB-INF/php-lib/blog-verification.php");
    include($_SERVER["DOCUMENT_ROOT"]."/WEB-INF/php-lib/blog-article-management.php"); 
    
    session_start();


    $title = $_POST["title"];
    $content = $_POST["content"];

    if (empty($title)||empty($content)) {
        echo "No content or title found.";
        exit;
    }

    //OK
    $conn = get_mysql_conn();
    select_webdb();

    $privilege = lookup_sid(session_id());
    echo $privilege;
    exit;

    if ($privilege=="admin") {

        $id = addArticle($title,$content);
        if($id != -1) {
            echo "Upload success! The article's id is ".$id;
        } else {
            echo "Internal error. Upload failed."
        }
    } else {
        if ($privilege=="overtime") {
            echo "Login overtime! Try login again";
        } else {
             echo "You don't have the admin privilege to upload an article! Or you can try login again.";
        }
    }

    close_mysql($conn);


?>