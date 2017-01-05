<?php
/**
 * 视图层
 */

namespace LanguageStatement\DesignModel\DesignMethod\MVC;


class View
{
    public function showUser(UserController $userController,UserModel $user)
    {
        echo $userController->getName($user)."\n";
    }

}