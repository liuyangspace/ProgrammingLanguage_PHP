<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/12/27
 * Time: 21:11
 */

namespace LanguageStatement\DesignModel\Facade;


class DeviceCPU implements DeviceInterface
{

    public function start()
    {
        echo "CPU start\n";
    }

    public function end()
    {
        echo "CPU end\n";
    }
}