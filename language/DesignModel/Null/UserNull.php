<?php
/**
 * 空用户 虚拟用户
 */

namespace LanguageStatement\DesignModel\Null;


class UserNull
{

    public function getName()
    {
        echo "this user unavailable\n";
    }

}