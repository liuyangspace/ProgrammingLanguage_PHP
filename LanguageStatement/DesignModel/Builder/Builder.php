<?php
/**
 * 建造者
 */

namespace LanguageStatement\DesignModel\Builder;


class Builder
{
    // 构建产品
    public function build($produceName){
        if($produceName=='产品1'){
            $produce=new ProduceExample1();
            $produce->addComponent(new ComponentExample1());
            $produce->addComponent(new ComponentExample1());
            $produce->addComponent(new ComponentExample2());
            return $produce;
        }
        if($produceName=='产品2'){
            $produce=new ProduceExample1();
            $produce->addComponent(new ComponentExample1());
            $produce->addComponent(new ComponentExample2());
            $produce->addComponent(new ComponentExample2());
            return $produce;
        }
        return false;
    }
}