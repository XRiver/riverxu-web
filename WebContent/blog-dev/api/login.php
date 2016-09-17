<?php
    session_start();


    include($_SERVER["DOCUMENT_ROOT"]."/WEB-INF/php-lib/mysql.php");
    include($_SERVER["DOCUMENT_ROOT"]."/WEB-INF/php-lib/blog-verification.php");
    $username = $_POST["username"];
    $password = $_POST["password"];

    
    $conn = get_mysql_conn();
    close_mysql($conn);
    select_webdb();
    $granted = verify_user($username,$password);
    
    if ($granted!="invalid") {
        buf_sid(session_id(),$granted);
    }
    echo "Message:".$granted;
    exit;

?>