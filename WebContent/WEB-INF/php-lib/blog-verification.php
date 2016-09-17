<?php
    $privileges = array(
        0=>"invalid",
        1=>"admin",
        2=>"guest",
        9=>"overtime"
    );

    $overtime_in_min = 15;

    /* Look for recent records of this session and find its granted privilege.
       Returns: If the sid was found and its most recent update time was within the limit time,
             then returns a string representing the privilege(value of $privileges);
             If the sid was found but was outdated, then returns "overtime";
             Else (sid was not found) returns "invalid".
        */
    function lookup_sid($sid) {

    }


    /* Keep privilege info of the sid in storage so it soon can be looked up. */
    function buf_sid($sid,$privilege) {

    }

    /* Look for privilege info of the user, returns a string representing its granted privilege.
       If it's not a user, "invalid" will be returned. */
    function verify_user($username,$password_in_md5) {

    }




?>