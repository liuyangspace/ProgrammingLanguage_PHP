<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/12/28
 * Time: 11:27
 */

namespace LanguageStatement\DesignModel\Proxy;


class Proxy
{
    protected $cpu=false;

    public function start()
    {
        if(!$this->cpu){
            $this->cpu=new DeviceCPU();
            echo "success:";
            $this->cpu->start();
        }else{
            echo "failure: one cpu already run \n";
        }

    }

    public function end()
    {
        if($this->cpu){
            echo "success:";
            $this->cpu->end();
            $this->cpu=false;
        }else{
            echo "failure: no cpu run \n";
        }
    }

}