<?php
    header("Content-type: text/html; charset=utf-8");

    include($_SERVER["DOCUMENT_ROOT"]."/WEB-INF/php-lib/mysql.php");
    include($_SERVER["DOCUMENT_ROOT"] . "/WEB-INF/php-lib/blog/blog-article-management.php");

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
        close_mysql($conn);
        exit;
    }

    $title = $article->getTitle();
    $content = $article->getContent();
    close_mysql($conn);
?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="X-UA-Compatible" content="IE=Edge">
        <title>
        <?php
            echo htmlspecialchars($title);
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
            <p><pre>
            <?php
                echo htmlspecialchars($content);
            ?>
            </pre></p>
        </article>
        <div id="add-comment">
        <form action="api/add-comment.php" method="post">
            <p>昵称：</p><input type="text" name="username" />
            <p>评论内容：</p><input type="text" name="content" />
            <input type="hidden" name="at" value="<?php echo $id;?>" />
            <button type="submit">添加评论</button>
        </form>

        </div>

    </body>
</html>