<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/1/5
 * Time: 9:38
 */

namespace LanguageStatement\DesignModel\DesignMethod\MVC;


class UserController
{
    public function changeName(UserModel $user,$name)
    {
        $user->setName($name);
    }

    public function getName(UserModel $user)
    {
        return $user->getName();
    }
}