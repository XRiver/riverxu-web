<?php
/**
 * Created by PhpStorm.
 * User: 徐江河
 * Date: 2016/12/17
 * Time: 15:33
 */

namespace blog;


class User
{
    private $username;
    private $privilege;

    public function __construct($username,$privilege)
    {
        $this->username = $username;
        $this->privilege = $privilege;
    }

    /**
     * @return mixed
     */
    public function getPrivilege()
    {
        return $this->privilege;
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