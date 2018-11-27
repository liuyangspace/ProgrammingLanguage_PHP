<?php
/**
 * Created by PhpStorm.
 * User: VULCAN
 * Date: 2018/7/19
 * Time: 11:04
 */

class HtmlLocal
{

    public $prefixLimit;

    public $url;
    public $path;
    public static $localLink = [];
    public static $exportLinks = [];

    public static $recursionLength = 128;

    public function setRecursionLength($length){
        static::$recursionLength = $length;
        return $this;
    }

    public function grab($url){
        $this->url = $url;
        return $this;
    }

    public function exportLink($url){
        if(!in_array($url,static::$exportLinks,true)){
            static::$exportLinks[] = $url;
        }
        return $this;
    }

    public function exportLinks(array $urls){
        static::$exportLinks = array_merge($urls,static::$exportLinks);
        return $this;
    }

    public function save($path){
        $this->path = $path;
        return $this;
    }

    public function limit($prefixLimit){
        $this->prefixLimit = $prefixLimit;
        return $this;
    }

    public function run(){
        $this->runAll($this->url,$this->path);
        Local::convertLinkToLocal($this->path);
    }

    public function runAll($url,$path,$limit=0){
        if(in_array($url,static::$localLink,true)
            || $limit>=static::$recursionLength
        ){
            return;
        }
        if($this->prefixLimit && strpos($url,$this->prefixLimit)!==0) return;
        foreach (static::$exportLinks as $exportLink){
            if(strpos($url,$exportLink)===0) return;
        }
        $html = $this->runOne($url,$path);printf("\t%s\n",$url);
        static::$localLink[]=$url;
        $links = $html->getALinks();
        foreach ($links as $link){
            $this->runAll($link,$path,$limit+1);
        }
    }

    public function runOne($url,$path){
        $html = Html::parseHtml($url);
        $local = new Local($url,$html);
        $local->saveTo($path);
        return $html;
    }
}