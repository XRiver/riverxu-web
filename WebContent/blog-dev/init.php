<?php
    $conn = mysql_connect("localhost","php","3014159");

    if (!$conn) {
        echo "数据库连接失败";
    } else {
        echo "数据库连接成功";
        mysql_select_db('riverweb');
        $sql = 'insert into users("username","password","granted") values ("admin","123456",1)';
        $result = mysql_query($sql);

        if($result) {
            echo "Success!";
        } else {
            echo "Failure.";
        }

        mysql_close($conn); 
    }

?>