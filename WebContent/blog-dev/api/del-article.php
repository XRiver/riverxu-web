<?php
/** Delete an article (identified by its id) from storage.
Method=POST
Parameter: id


*/


    function can_del_article($priv) {
        return $priv == "admin";
    }


    include($_SERVER["DOCUMENT_ROOT"]."/WEB-INF/php-lib/mysql.php");
    include($_SERVER["DOCUMENT_ROOT"] . "/WEB-INF/php-lib/blog/blog-verification.php");
    include($_SERVER["DOCUMENT_ROOT"] . "/WEB-INF/php-lib/blog/blog-article-management.php");
    
    session_start();

    $id = $_POST["id"];

    if (empty($id)) {
        echo "E01"; // No id parameter found.
        exit;
    }

    $conn = get_mysql_conn();
    select_webdb();

    $user = lookup_sid(session_id());
    $privilege = $user->getPrivilege();

    if (can_del_article($privilege)) {
        $result = delArticle($id);
        switch ($result) {
        case 0://Success
            echo $id;break;
        case 1://Cannot find article
            echo "E02";break;
        case 2://Database internal error
        default:
            echo "E03";break;
        }
    } else { //Privilege failure handling
        echo "E04";
    }

    mysql_close();

?>