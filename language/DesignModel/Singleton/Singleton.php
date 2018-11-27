<?php
/**
 * 单例
 */

namespace LanguageStatement\DesignModel\Singleton;


class Singleton
{
    public static $instance=null;
    //java 多线程下的单例
    //public static $instance=new Singleton();

    private function __construct()
    {

    }

    public static function getInstance(){
        if(self::$instance===null){
            self::$instance=new Singleton();
            //java 多线程下的单例
//            synchronized (Singleton.class) {
//                if (instance == null) {
//                    instance = new Singleton();
//                }
//            }
        }
        return self::$instance;
    }

    //动态资源
    public $asset;
    public function setAsset($param){$this->asset=$param;}
    public function getAsset(){return $this->asset;}
}