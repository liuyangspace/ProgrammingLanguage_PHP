<?php
/**
 * Created by PhpStorm.
 * User: VULCAN
 * Date: 2018/7/19
 * Time: 13:55
 */

class Html
{
    public $url;
    public $htmlText;

    public $cssLinks = [];
    public $jsLinks = [];
    public $imgLinks = [];
    public $aLinks = [];

    function __construct()
    {

    }

    static function parseHtml($url){
        $html = new static();
        $html->url = $url;
        $html->htmlText = CurlPlus::httpGet($url);
        $rawHtmlText = $html->htmlText;

        $rawHtmlText=str_replace('<',' <',$rawHtmlText);
        $rawHtmlText=str_replace('>',' > ',$rawHtmlText);
        $rawHtmlText=str_replace('/ > ',' /> ',$rawHtmlText);
        $length = strlen($rawHtmlText);
        $htmlElementWord = [];
        $htmlWord = '';
        for ($i=0;$i<$length;$i++){
            if(in_array($rawHtmlText[$i],["\n"," ","\t","\r"],true)){ // 空白符
                if(empty($htmlWord)){
                    continue;
                }else{
                    $htmlElementWord[]=$htmlWord;
                    if(strpos($htmlWord,'>')!==false){
                        //var_dump(implode(' ',$htmlElementWord));
                        $html->readCssLink($htmlElementWord);
                        $html->readJsLink($htmlElementWord);
                        $html->readImgLink($htmlElementWord);
                        $html->readALink($htmlElementWord);
                        $htmlElementWord=[];
                    }
                    // var_dump($htmlWord);
                    $htmlWord = '';
                }
            }else{
                $htmlWord.=$rawHtmlText[$i];
            }
        }

        return $html;
    }

    function readCssLink($htmlElementWords){
        if(in_array('<link',$htmlElementWords)
            && in_array('rel="stylesheet"',$htmlElementWords)
        ){
            foreach ($htmlElementWords as $htmlElementWord){
                if(strpos($htmlElementWord,'href=\'')===0 || strpos($htmlElementWord,'href="')===0){
                    $link = substr($htmlElementWord,5);
                    if($link[strlen($link)-1]=='>') $link = substr($link,0,strlen($link)-1);
                    if($link[strlen($link)-1]=='/') $link = substr($link,0,strlen($link)-1);
                    $link = trim($link,'\'');
                    $link = trim($link,'"');
                    $realLink = URL::realLink($this->url,$link);
                    $this->cssLinks[] = $realLink;
                    //$tmpElementWord = str_replace($link,$realLink,$htmlElementWord);
                    $tmpElementWord = "href=\"{$realLink}\"";
                    $this->htmlText = str_replace($htmlElementWord,$tmpElementWord,$this->htmlText);
                }
            }
        }
    }

    function readJsLink($htmlElementWords){
        if(in_array('<script',$htmlElementWords) ){
            foreach ($htmlElementWords as $htmlElementWord){
                if(strpos($htmlElementWord,'src=\'')===0 || strpos($htmlElementWord,'src="')===0){
                    $link = substr($htmlElementWord,4);
                    if($link[strlen($link)-1]=='>') $link = substr($link,0,strlen($link)-1);
                    if($link[strlen($link)-1]=='/') $link = substr($link,0,strlen($link)-1);
                    $link = trim($link,'\'');
                    $link = trim($link,'"');
                    $realLink = URL::realLink($this->url,$link);
                    $this->jsLinks[] = $realLink;
                    //$tmpElementWord = str_replace($link,$realLink,$htmlElementWord);
                    $tmpElementWord = "src=\"{$realLink}\"";
                    $this->htmlText = str_replace($htmlElementWord,$tmpElementWord,$this->htmlText);
                }
            }
        }
    }

    function readImgLink($htmlElementWords){
        if(in_array('<img',$htmlElementWords) ){
            foreach ($htmlElementWords as $htmlElementWord){
                if(strpos($htmlElementWord,'src=\'')===0 || strpos($htmlElementWord,'src="')===0){
                    $link = substr($htmlElementWord,4);
                    if($link[strlen($link)-1]=='>') $link = substr($link,0,strlen($link)-1);
                    if($link[strlen($link)-1]=='/') $link = substr($link,0,strlen($link)-1);
                    $link = trim($link,'\'');
                    $link = trim($link,'"');
                    $realLink = URL::realLink($this->url,$link);
                    if(strpos($realLink,'http')===0){
                        $this->imgLinks[] = $realLink;
                        //$tmpElementWord = str_replace($link,$realLink,$htmlElementWord);
                        $tmpElementWord = "src=\"{$realLink}\"";
                        $this->htmlText = str_replace($htmlElementWord,$tmpElementWord,$this->htmlText);
                    }
                }
            }
        }
    }

    function readALink($htmlElementWords){
        if(in_array('<a',$htmlElementWords) ){
            foreach ($htmlElementWords as $htmlElementWord){
                if(strpos($htmlElementWord,'href=\'')===0 || strpos($htmlElementWord,'href="')===0){
                    $link = substr($htmlElementWord,5);
                    if($link[strlen($link)-1]=='>') $link = substr($link,0,strlen($link)-1);
                    if($link[strlen($link)-1]=='/') $link = substr($link,0,strlen($link)-1);
                    $link = trim($link,'\'');
                    $link = trim($link,'"');
                    if(strpos($link,"#")===false){
                        $realLink = URL::realLink($this->url,$link);
                        if(strpos($realLink,'http://')===0 || strpos($realLink,'https://')===0){
                            $this->aLinks[] = $realLink;
                            //$tmpElementWord = str_replace($link,$realLink,$htmlElementWord);
                            $tmpElementWord = "href=\"{$realLink}\"";
                            //printf("%s\t=>\t%s\n",$link,$realLink);
                            $this->htmlText = str_replace($htmlElementWord,$tmpElementWord,$this->htmlText);
                        }
                    }
                }
            }
        }
    }

    function getCssLinks(){
        return $this->cssLinks;
    }

    function getJsLinks(){
        return $this->jsLinks;
    }

    function getImgLinks(){
        return $this->imgLinks;
    }

    function getALinks(){
        return $this->aLinks;
    }
}