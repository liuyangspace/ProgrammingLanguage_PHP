<?php
/**
 * Created by PhpStorm.
 * User: VULCAN
 * Date: 2018/7/19
 * Time: 15:37
 */

class Local
{
    public $baseUrl;
    public $html;

    const ASSET_TYPE_CSS    = 1;
    const ASSET_TYPE_JS     = 2;
    const ASSET_TYPE_IMG    = 3;

    const RUN_MODE_GROW = 1;    // 动态生长性抓取，进程中断后，已本地化的页面仍可使用 （速递较慢）
    const RUN_MODE_POUR = 2;    // 分批抓取，进程中断后 未抓取的页面外链不可用 （速递较快）
    public static $runModel = self::RUN_MODE_POUR;

    public static $assetLinkMapFile = [];// link -> file
    public static $jsLinkMapFile = [];
    public static $imageLinkMapFile = [];

    public static $htmlLinkMapFile = [];

    public function __construct($baseUrl,Html $html)
    {
        $this->baseUrl = $baseUrl;
        $this->html = $html;
    }

    public function saveTo($path){
        $basePath = $path;
        $assetLinks = $this->html->getCssLinks();
        foreach ($assetLinks as $cssLink){
            $this->assetSave($basePath,$cssLink,self::ASSET_TYPE_CSS);
        }
        $assetLinks = $this->html->getJsLinks();
        foreach ($assetLinks as $cssLink){
            $this->assetSave($basePath,$cssLink,self::ASSET_TYPE_JS);
        }
        $assetLinks = $this->html->getImgLinks();
        foreach ($assetLinks as $cssLink){
            $this->assetSave($basePath,$cssLink,self::ASSET_TYPE_IMG);
        }
        $this->htmlSave($basePath);
    }

    public function assetSave($basePath,$cssLink,$assetType=self::ASSET_TYPE_CSS){
        if(array_key_exists($cssLink,static::$assetLinkMapFile)){
            return static::$assetLinkMapFile[$cssLink];
        }
        // filename
        $filename = array_reverse(explode('/',$cssLink))[0];
        if(strpos($filename,'?')>0){
            $filename = substr($filename,0,strpos($filename,'?'));
        }
        $filename = time().'_'.rand(1000,9999).'_'.$filename;
        // dir
        $typeMapPath = [
            self::ASSET_TYPE_CSS => 'css',
            self::ASSET_TYPE_JS => 'js',
            self::ASSET_TYPE_IMG => 'img',
        ];
        $filePath = 'asset'.DIRECTORY_SEPARATOR.$typeMapPath[$assetType];
        $dirPath = $basePath.DIRECTORY_SEPARATOR.$filePath;
        if(!file_exists($dirPath)){
            mkdir($dirPath,0777,true);
        }
        $filePath = $filePath.DIRECTORY_SEPARATOR.$filename;
        //
        $fileContent = CurlPlus::httpGet($cssLink);
        //
        file_put_contents($basePath.DIRECTORY_SEPARATOR.$filePath,$fileContent);
        static::$assetLinkMapFile[$cssLink]=str_replace(DIRECTORY_SEPARATOR,'/',$filePath);
        return $filePath;
    }

    public function htmlSave($basePath){
        if(array_key_exists($this->baseUrl,static::$htmlLinkMapFile)){
            return static::$htmlLinkMapFile[$this->baseUrl];
        }
        $htmlText = $this->html->htmlText;
        if(empty($htmlText)) return false;
        // asset
        foreach (static::$assetLinkMapFile as $link=> $file){
            $htmlText = str_replace($link,$file,$htmlText);
        }
        // html
        $filename = str_replace('/','_',parse_url($this->baseUrl, PHP_URL_PATH));
        $filename = trim($filename,'.html');
        $filename = trim($filename,'.htm');
        $filename = trim($filename,'.php');
        $filename = trim($filename,'.jsp');
        $filename = trim($filename,'.asp');
        $query = str_replace('=','_',parse_url($this->baseUrl, PHP_URL_QUERY));
        $filename = $filename."__".$query;
        $filename = $filename.'.html';
        file_put_contents($basePath.DIRECTORY_SEPARATOR.$filename,$htmlText);
        // history
        static::$htmlLinkMapFile[$this->baseUrl] = $filename;
        if(static::$runModel==self::RUN_MODE_GROW){
            static::convertLinkToLocal($basePath);
        }
        return $filename;
    }

    public static function convertLinkToLocal($basePath){
        foreach (static::$htmlLinkMapFile as $htmlFIle){
            $htmlFIlePath = $basePath.DIRECTORY_SEPARATOR.$htmlFIle;
            $content = file_get_contents($htmlFIlePath);
            foreach (static::$htmlLinkMapFile as $url=>$tmpHtmlFIle){
                $content = str_replace("href=\"{$url}\"","href=\"{$tmpHtmlFIle}\"",$content);
            }
            file_put_contents($htmlFIlePath,$content);
        }
    }

    private function windowsFileName($filename){
        if(strlen($filename)>200){
            $filename = md5($filename);
        }
        return str_replace(['?','\\','*','|','<','>',':'],'',$filename);
    }

    private function urlHtmlToLocalPath($url){
        $dir='';
        $filename='';
        if($path = parse_url($url, PHP_URL_PATH)){
            $path = trim($path,'/');
            $pathArr = explode('/',$path);
            $filename = array_pop($pathArr);
            $filename = trim($filename,'.html');
            $filename = trim($filename,'.htm');
            $filename = trim($filename,'.php');
            $filename = trim($filename,'.jsp');
            $filename = trim($filename,'.asp');
            $dir = implode(DIRECTORY_SEPARATOR,$pathArr);
        }
        if($query = parse_url($url, PHP_URL_QUERY)){
            $filename .= $query;
        }
        if(empty($filename)){
            $filename = 'index';
        }
        $filename .= '.html';
        return trim($dir.DIRECTORY_SEPARATOR.$filename,DIRECTORY_SEPARATOR);
    }
}