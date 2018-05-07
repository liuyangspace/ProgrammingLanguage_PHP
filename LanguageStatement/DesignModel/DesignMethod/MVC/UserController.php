<?php
/**
 * 控制层
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