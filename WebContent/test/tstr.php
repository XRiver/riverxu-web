<?php

    function br(){echo "<br>";}

    $full_str = "Not empty";
    $empty_str = "";

    if ($full_str) {
        echo "Full str works for TRUE";
    } else {
        echo "Full str works for FALSE";
    }

    br();

    if ($empty_str) {
        echo "Empty str works for TRUE";
    } else {
        echo "Empty str works for FALSE";
    }

    br();

    $a_null_var = null;
    $a_unset_var;

    if ($a_null_var) {
        echo "Null works for TRUE";
    } else {
        echo "Null works for FALSE";
    }

    br();

    if ($a_unset_var) {
        echo "Unset var works for TRUE";
    } else {
        echo "Unset var works for FALSE";
    }

    br();

    class AObject {
        public function __construct(){}
    }

    $aobject = new AObject();

    if ($aobject) {
        echo "A object works for TRUE";
    } else {
        echo "A object works for FALSE";
    }


?>