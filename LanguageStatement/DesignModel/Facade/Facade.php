<?php
/**
 * 外观模式（Facade Pattern）
 */

namespace LanguageStatement\DesignModel\Facade;


class Facade
{
    protected $cpu;
    protected $ram;

    public function __construct()
    {
        $this->cpu=new DeviceCPU();
        $this->ram=new DeviceRAM();
    }

    public function start()
    {
        $this->ram->start();
        $this->cpu->start();
    }

    public function end()
    {
        $this->cpu->end();
        $this->ram->end();
    }
}