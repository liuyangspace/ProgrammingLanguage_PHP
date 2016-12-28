<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/12/28
 * Time: 13:27
 */

namespace LanguageStatement\DesignModel\ChainOfResponsibility;


class PackBottle extends PackChain
{

    public function pack($param)
    {
        if(strpos($param,'water')!==false){
            echo "bottle pack:$param\n";
        }else{
            if($this->next instanceof PackInterface){
                $this->next->pack($param);
            }else{
                echo "can't pack\n";
            }
        }
    }

}