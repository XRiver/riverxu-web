<?php
    session_start();


    include($_SERVER["DOCUMENT_ROOT"]."/WEB-INF/php-lib/mysql.php");
    include($_SERVER["DOCUMENT_ROOT"]."/WEB-INF/php-lib/blog-verification.php");
    $username = $_POST["username"];
    $password = $_POST["password"];

    
    $conn = get_mysql_conn();
    select_webdb();
    
    $granted = verify_user($username,$password);

    if ($granted!="invalid") {
        $existed = lookup_sid(session_id());
        if ($existed!="invalid") {
            refresh_sid_life(session_id())
        } else {
            buf_sid(session_id(),$granted);
        }
        
    }
    echo $granted;

    close_mysql($conn);
?>