<?php
/**
 * 外观类调用的类
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