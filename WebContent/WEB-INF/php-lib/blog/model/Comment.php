<?php
/**
 * Created by PhpStorm.
 * User: 徐江河
 * Date: 2016/12/17
 * Time: 16:21
 */

namespace blog;


class Comment
{
    private $at;
    private $content;
    private $time;
    private $username;

    /**
     * Comment constructor.
     * @param $at
     * @param $content
     * @param $time
     * @param $username
     */
    public function __construct($at, $content, $time, $username)
    {
        $this->at = $at;
        $this->content = $content;
        $this->time = $time;
        $this->username = $username;
    }


    /**
     * @return mixed
     */
    public function getPosition()
    {
        return $this->at;
    }

    /**
     * @return mixed
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * @return mixed
     */
    public function getTime()
    {
        return $this->time;
    }

    /**
     * @return mixed
     */
    public function getUsername()
    {
        return $this->username;
    }
}

?>