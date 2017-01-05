<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/1/5
 * Time: 9:38
 */

namespace LanguageStatement\DesignModel\DesignMethod\MVC;


class View
{
    public function showUser(UserController $userController,UserModel $user)
    {
        echo $userController->getName($user)."\n";
    }

}