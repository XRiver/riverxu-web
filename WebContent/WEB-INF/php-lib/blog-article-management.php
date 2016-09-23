<?php

    class Article {
        private $title, $content;
        public function Article($title,$content) {
            $this->title = $title;
            $this->content = $content;
        }

        public function getTitle() {return $this->title;}
        public function getContent() {return $this->content;}

    }

    class MetaArticle {
        private $id, $title;
        public function MetaArticle($id,$title) {
            $this->id = $id;
            $this->title = $title;
        }

        public function getId() {return $this->id;}
        public function getTitle() {return $this->title;}
    }



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
            array_push($meta_array,new MetaArticle($id,$title));
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
            return new Article($title,$content);
        } else {
            return null;
        }
    }

    /* Delete an article identified by its ID. 
        Pre-condition: Connected to the web's database.
        Returns: status code.
             0 for success deletion; 1 for cannot find the corresponding article. 2 for database internal error.*/
    function delArticle($id) {
        //table articles (id INT primary key auto_increment,title TINYTEXT,content TEXT);




        return 2;
    }

?>