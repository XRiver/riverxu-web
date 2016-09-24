<?php
    header("Content-type: text/html; charset=utf-8");

    include($_SERVER["DOCUMENT_ROOT"]."/WEB-INF/php-lib/mysql.php");
    include($_SERVER["DOCUMENT_ROOT"]."/WEB-INF/php-lib/blog-article-management.php"); 

    if (!isset($_GET["id"])) {
        echo "Article id is necessary for article viewing.";
        exit;
    }

    $id = $_GET["id"];

    $conn = get_mysql_conn();
    select_webdb();

    $article = getArticle($id);

    if ($article==null) {
        echo "Cannot find article identified by '".$id."'";
        close_mysql();
        exit;
    }

    $title = $article->getTitle();
    $content = $article->getContent();

?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="X-UA-Compatible" content="IE=Edge">
        <title>
        <?php
            echo $title;
        ?>
        </title>
    </head>
    <body>
        <article>
            <h1>
            <?php
                echo htmlspecialchars($title);
            ?>
            </h1>
            <p>
            <?php
                echo htmlspecialchars($content);
            ?>
            </p>
        </article>
    </body>
</html>