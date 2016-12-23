<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/12/22
 * Time: 16:32
 */

namespace LanguageStatement\DesignModel\Adapter;


class Play implements PlayInterface
{

    public function play($param)
    {
        $tmpArr=explode('.',$param);
        $extensionName=array_pop($tmpArr);
        if($extensionName=='jpg'){
            (new Image())->play($param);
        }elseif(in_array($extensionName,['mp4','avi'])){
            (new Video())->play($param);
        }else{
            echo 'Undefined type:'."$param\n";
        }
    }
}