<?php

/* Add an article to the storage.
    Pre-condition: Conntented to the web's database. 
    Returns: ID for the article(1~...). If cannot add article for some exception, return -1. */
    function addArticle($title,$content) {
        //table articles (id INT primary key auto_increment,title TINYTEXT,content TEXT);
        $pro_title = addslashes($title);
        $pro_content = addslashes($content);

        $sql = "insert into articles (title,content) values ('".$pro_title."','".$pro_content."')";
        if (mysql_query($sql)) {
            $sql = "select id from articles where title='".addslashes($title)."'";
            $found = mysql_query($sql);
            $row = mysql_fetch_row($found);
            if ($row) {
                return $row[0];
            } else {
                return -1;
            }
        } else {
            return -1;
        }
    }


?>