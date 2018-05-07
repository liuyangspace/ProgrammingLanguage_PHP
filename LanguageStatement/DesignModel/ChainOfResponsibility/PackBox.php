<?php
/**
 * 处理类 处理或转到下一个处理类
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