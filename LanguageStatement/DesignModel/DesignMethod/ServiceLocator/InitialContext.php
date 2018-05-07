<?php
/**
 * JNDI 查询
 */

namespace LanguageStatement\DesignModel\DesignMethod\ServiceLocator;


class InitialContext
{
    public function lookup($jndiName)
    {
        if($jndiName=='service1'){
            echo "Looking up and creating a new Service1 object\n";
            return new Service1();
        }else{
            echo "Looking up and creating a new Service2 object\n";
            return new Service2();
        }
    }
}