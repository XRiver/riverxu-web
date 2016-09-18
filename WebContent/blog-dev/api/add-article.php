<?php
    $title = $_POST["title"];
    $content = $_POST["content"];

    //Stub implementation
    if (!empty($title)&&!empty($content)) {
        echo "Got your new article!<br>Title:".$title."<br>.Content:".$content;
    } else {
        echo "No content/title found.";
    }
?>
