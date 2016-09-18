<?php

    include($_SERVER["DOCUMENT_ROOT"]."/WEB-INF/php-lib/mysql.php");
    include($_SERVER["DOCUMENT_ROOT"]."/WEB-INF/php-lib/blog-verification.php");
    include($_SERVER["DOCUMENT_ROOT"]."/WEB-INF/php-lib/blog-article-management.php"); 

    echo "File included";
    

    session_start();

    echo "session started.";
/*
    $title = $_POST["title"];
    $content = $_POST["content"];

    if (empty($title)||empty($content)) 
        echo "No content/title found.";
        //exit;
    }
    echo "title and content got.";

    $conn = null;
    try {
        global $conn;
        $conn = get_mysql_conn();
        select_webdb();

    } catch (Exception $e) {
        echo "Error connectiong to MySQL";
        exit;
    }

    $privilege = null;
    try {
        global $privilege;
        $privilege = lookup_sid(session_id());

    } catch (Exception $e) {
        echo "Error finding the privilege";
        exit;
    }

    try {
        global $privilege;
        if ($privilege=="admin") {
            echo "admin privilege detected...\n";
            $id = addArticle($title,$content);
            if($id!=-1) {
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

    } catch (Exception $e) {
        echo "Priv is ".$privilege;
        echo "Error adding articles";
        exit;
    }

    try {
        global $conn;
        close_mysql($conn);

    } catch (Exception $e) {
        echo "Error disconnectiong";
        exit;
    }

    

*/


?>