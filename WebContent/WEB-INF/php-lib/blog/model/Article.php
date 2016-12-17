<?php
/**
 * Created by PhpStorm.
 * User: 徐江河
 * Date: 2016/12/17
 * Time: 16:24
 */

namespace blog;


class Article {
    private $title, $content;

    /**
     * Article constructor.
     * @param $title
     * @param $content
     */
    public function __construct($title, $content)
    {
        $this->title = $title;
        $this->content = $content;
    }

    public function getTitle() {return $this->title;}
    public function getContent() {return $this->content;}

}

?>