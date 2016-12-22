<?php
/**
 *
 */

namespace LanguageStatement\DesignModel\Adapter;


class Adapter implements VideoInterface
{

    public function play($param)
    {
        $tmpArr=explode('.',$param);
        $extensionName=array_pop($tmpArr);
        if($extensionName=='mp4'){
            (new VideoMp4())->play($param);
        }elseif($extensionName=='avi'){
            (new VideoAvi())->play($param);
        }else{
            echo 'Undefined type!';
        }
    }
}