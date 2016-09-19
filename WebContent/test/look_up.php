<?php

    include($_SERVER["DOCUMENT_ROOT"]."/WEB-INF/php-lib/blog-verification.php");
    session_start();
    $privilege = lookup_sid(session_id());
    echo $privilege;

?>