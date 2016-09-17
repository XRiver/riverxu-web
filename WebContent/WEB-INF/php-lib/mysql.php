<?php
    function get_mysql_conn() {
        return mysql_connect("localhost","php","3014159");
    }

    function select_webdb() {
        mysql_select_db("riverweb");
    }

    function close_mysql($conn) {
        mysql_close($conn);
    }
?>