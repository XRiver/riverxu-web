<?php
/**
 * Created by PhpStorm.
 * User: 徐江河
 * Date: 2016/12/17
 * Time: 16:37
 */
$username;
$content;
$position;
if (isset($_POST["username"]) && isset($_POST["content"]) && isset($_POST["at"])) {
    $username = $_POST["username"];
    $content = $_POST["content"];
    $position = $_POST["at"];
} else {
    echo "username, content and position must be set!";
    exit;
}

include($_SERVER["DOCUMENT_ROOT"]."/WEB-INF/php-lib/mysql.php");
include($_SERVER["DOCUMENT_ROOT"] . "/WEB-INF/php-lib/blog/blog-comment-management.php");

$conn = get_mysql_conn();
select_webdb();
$result = addComment($username,$content,$position);

if ($result==0) {
    echo "SUCCESS";
} else {
    echo "FAILURE";
}

close_mysql($conn);

?>