<?php
    $str_id = "3";
    try {
        echo $str_id != 2;
    } catch (Exception $e) {
        echo "Beyond comparison";
    }
    
?>