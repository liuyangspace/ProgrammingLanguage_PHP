<?php
/**
 * 要实例化类
 */

namespace LanguageStatement\DesignModel\Flyweight;


class DatabaseMysql implements DataBaseInterface
{
    protected $id;
    protected $ip;

    public function __construct($ip)
    {
        $this->id=mt_rand(1,9999);
        $this->ip=$ip;
    }

    public function connect()
    {
        echo "mysql connect(id:$this->id) to $this->ip\n";
    }

}