<?php
    session_start();


    try {
        include($_SERVER["DOCUMENT_ROOT"]."/WEB-INF/php-lib/mysql.php");
        include($_SERVER["DOCUMENT_ROOT"]."/WEB-INF/php-lib/blog-verification.php");
        $username = $_POST["username"];
        $password = $_POST["password"];


        $conn = get_mysql_conn();
        select_webdb();
        $granted = verify_user($username,$password);
        if ($granted!="invalid") {
            buf_sid(session_id(),$granted);
        }
        echo $granted;
        close_mysql($conn);
    } catch(Exception $e) {
        echo "Exception!!".$e->getMessage();
        echo "File:".$e->getFile();
        echo "Line:".$e->getLine();
    }
    

?>