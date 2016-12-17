<?php
/**
 * Created by PhpStorm.
 * User: 徐江河
 * Date: 2016/12/17
 * Time: 16:27
 */

/* Add a comment to the storage.
    Pre-condition: Conntented to the web's database.
    Returns: 0 for success, -1 for failure */
function addComment($user,$content,$position) {
    $pro_user = addslashes($user);
    $pro_content = addslashes($content);
    $time = time();

    $sql = "insert into comments (at,content,username,time) values ($position,'$pro_content','$pro_user',$time)";
    if (mysql_query($sql)) {
        return 0;
    } else {
        return -1;
    }
}

?>