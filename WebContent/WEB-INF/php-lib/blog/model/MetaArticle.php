<?php
/**
 * Created by PhpStorm.
 * User: 徐江河
 * Date: 2016/12/17
 * Time: 16:25
 */

namespace blog;

class MetaArticle {
    private $id, $title;
    public function MetaArticle($id,$title) {
        $this->id = $id;
        $this->title = $title;
    }

    public function getId() {return $this->id;}
    public function getTitle() {return $this->title;}
}

?>