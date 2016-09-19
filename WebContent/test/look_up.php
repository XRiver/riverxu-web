<?php

    include($_SERVER["DOCUMENT_ROOT"]."/WEB-INF/hp-lib/blog-verification.php");
    session_start();
    $privilege = lookup_sid(session_id());
    echo $privilege;

?>