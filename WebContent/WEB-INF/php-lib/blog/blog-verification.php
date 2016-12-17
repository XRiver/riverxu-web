<?php
    $privileges = array(
        0=>"invalid",
        1=>"admin",
        9=>"overtime"
    );

    $overtime_in_min = 15;

    include ($_SERVER["DOCUMENT_ROOT"]."/WEB-INF/php-lib/blog/model/User.php");

    /* Look for recent records of this session and find its granted privilege. Will automatically refresh sid's overtime.
    Pre-condition: Connected to the database.
       Returns: If the sid was found and its most recent update time was within the limit time,
             then returns a string representing the privilege(value of $privileges);
             If the sid was found but was outdated, then returns "overtime";
             Else (sid was not found) returns "invalid".
        */
    function lookup_sid($sid) {
        // table sid_buf(sid varchar(30),recent_visit BIGINT, granted tinyint)
        global $privileges;

        $sql = "select recent_visit,granted,username from sid_buf where sid='".$sid."'";
        $found = mysql_query($sql);
        $row = mysql_fetch_row($found);
        
        if(!$row) {
            return new \blog\User("INVALID",$privileges[0]);
        } else {
            
            $timestamp = $row[0];
            $granted = $row[1];
            $username = $row[2];

            if(overtime($timestamp)) {
                return new \blog\User($username,$privileges[9]);
            } else {
                refresh_sid_life($sid);
                return new \blog\User($username,$granted);
            }
        }
    }

    function refresh_sid_life($sid) {
        $sql = "update sid_buf set recent_visit=".time()." where sid='".$sid."'";
        mysql_query($sql);
    }

    function overtime($prev_timestamp) {
        global $overtime_in_min;
        return (time()-intval($prev_timestamp)) > ($overtime_in_min*60);
    }


    /* Keep privilege info of the sid in storage so it soon can be looked up.
    Pre-condition: Connected to the database.
    Returns: void 
    */
    function buf_sid($sid,$privilege,$username) {
        // table sid_buf(sid varchar(30),recent_visit BIGINT, granted tinyint)
        global $privileges;

        if ($index = array_search($privilege,$privileges) !== false) {
            $time = time();
            $sql = "insert into sid_buf (sid,recent_visit,granted,username) values ('".
                $sid."',".$time.",".$index.",'".$username."');";
            mysql_query($sql);
        }
    }

    /* Look for privilege info of the user, returns a string representing its granted privilege.
       If it's not a user, "invalid" will be returned. 
       Pre-condition: Connected to the database.
       Returns: void
       */
    function verify_user($username,$password_in_md5) {

        global $privileges;

        $sql = "select username,password,granted from users where username='".$username."'";
        $found = mysql_query($sql);
        $row = mysql_fetch_row($found);
        if (!$row) {
            return new \blog\User("INVALID",$privileges[0]);
        } else {
            if ($username==$row[0]&&$password_in_md5==$row[1]) {
                return new \blog\User($username,$privileges[$row[2]]);
            } else {
                return new \blog\User("INVALID",$privileges[0]);
            }
        }
    }




?>