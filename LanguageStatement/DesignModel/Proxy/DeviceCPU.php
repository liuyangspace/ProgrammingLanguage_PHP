<?php
/**
 * 被代理的类
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