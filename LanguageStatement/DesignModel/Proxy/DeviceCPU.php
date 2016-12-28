<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/12/28
 * Time: 11:53
 */

namespace LanguageStatement\DesignModel\Proxy;


class DeviceCPU implements DeviceInterface
{

    public function start()
    {
        $this->run=true;
        echo "CPU start\n";
    }

    public function end()
    {
        $this->run=false;
        echo "CPU end\n";
    }

}