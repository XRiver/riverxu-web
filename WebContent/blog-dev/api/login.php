<?php
    session_start();


    include($_SERVER["DOCUMENT_ROOT"]."/WEB-INF/php-lib/mysql.php");
    include($_SERVER["DOCUMENT_ROOT"] . "/WEB-INF/php-lib/blog/blog-verification.php");
    $username = $_POST["username"];
    $password = $_POST["password"];

    
    $conn = get_mysql_conn();
    select_webdb();
    
    $user = verify_user($username,$password);
    $granted = $user->getPrivilege();

    if ($granted!="invalid") {
        $existedUser = lookup_sid(session_id());
        $existed = $existedUser->getPrivilege();
        if ($existed!="invalid") {
            refresh_sid_life(session_id());
        } else {
            buf_sid(session_id(),$granted,$username);
        }
        
    }
    echo $granted;

    setcookie("privilege",$granted,0,'/blog-dev/');
    close_mysql($conn);
?>