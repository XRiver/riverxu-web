<?php
    session_start();

    //Stub implementation of user verification
    $username = $_POST["username"];
    $password = $_POST["password"];
    if (!empty($username)&&!empty($password)) {
        if ($username=="admin"&&$password=="123456") {
            echo "admin";
        } else {
            echo "guest";
        }
    } else {
        echo "invalid";
    }

?>