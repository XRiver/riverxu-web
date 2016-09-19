<?php
    include($_SERVER["DOCUMENT_ROOT"]."/WEB-INF/php-lib/blog-article-management.php");

    $meta = new MetaArticle(7,"Dummy");

    echo "Id:".$meta->getId().",Title:".$meta->getTitle();
?>