<?php

include_once($_SERVER['DOCUMENT_ROOT']."/WEB-INF/php-lib/blog/model/Article.php");
include_once($_SERVER['DOCUMENT_ROOT']."/WEB-INF/php-lib/blog/model/MetaArticle.php");

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


    /* Get an array of meta-data of all articles.
         Pre-condition:  Conntented to the web's database. 
         Returns: An array of MetaArticle objects representing all articles in storage. */
    function getArticleList() {
        $meta_array = array();
        //table articles (id INT primary key auto_increment,title TINYTEXT,content TEXT);

        $sql = "select id,title from articles";
        $found = mysql_query($sql);
        $row = null;
        while ($row = mysql_fetch_row($found)) {
            $id = $row[0];
            $title = $row[1];

            $result = new \blog\MetaArticle($id,$title);
            var_dump($result);
            array_push($meta_array,$result);
        }

        return $meta_array;
    }

    /* Get an article by its id.
        Pre-condition: Conntented to the web's database. 
        Returns: An Article object. If the id is invalid, returns null. */
    function getArticle($id) {
        //table articles (id INT primary key auto_increment,title TINYTEXT,content TEXT);
        $sql = "select title,content from articles where id=".$id;
        $found = mysql_query($sql);
        $row = null;
        if ($row = mysql_fetch_row($found)) {
            $title = $row[0];
            $content = $row[1];
            return new \blog\Article($title,$content);
        } else {
            return null;
        }
    }

    /* Delete an article identified by its ID. 
        Pre-condition: Connected to the web's database.
        Returns: status code.
             0 for success deletion; 1 for cannot find the article, 2 for database internal error.*/
    function delArticle($id) {
        //table articles (id INT primary key auto_increment,title TINYTEXT,content TEXT);
        $sql = "delete from articles where id=".$id;
        try {
            $result = mysql_query($sql);
            if ($result) {
                $rows = mysql_affected_rows();
                if ($rows==1) {
                    return 0;
                } else if ($rows==0) {
                    return 1;
                }
            } else {
                return 2;
            }
        } catch (Exception $e) {
            return 2;
        }

        return 2;
    }

?>