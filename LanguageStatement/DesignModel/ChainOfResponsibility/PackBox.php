<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/12/28
 * Time: 13:33
 */

namespace LanguageStatement\DesignModel\ChainOfResponsibility;


class PackBox extends PackChain
{

    public function pack($param)
    {
        if(strpos($param,'bread')!==false){
            echo "box pack:$param\n";
        }else{
            if($this->next instanceof PackInterface){
                $this->next->pack($param);
            }else{
                echo "can't pack\n";
            }
        }
    }

}