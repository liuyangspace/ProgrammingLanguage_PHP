<?php
/**
 * Created by PhpStorm.
 * User: VULCAN
 * Date: 2018/7/19
 * Time: 15:23
 */

class URL
{
    static function realLink($baseUrl,$relativeUrl){

        //$baseUrls = parse_url($baseUrl);
        if(strpos($relativeUrl,'javascript:')===0){
            return $relativeUrl;
        }elseif (strpos($relativeUrl,'data:image/')===0){
            return $relativeUrl;
        }else{
            //$relativeUrl = urlencode($relativeUrl);
            if(strpos($relativeUrl,'http://')===0 || strpos($relativeUrl,'https://')===0){
                return $relativeUrl;
            }elseif (strpos($relativeUrl,'//')===0){
                return parse_url($baseUrl,PHP_URL_SCHEME).':'.$relativeUrl;
            }elseif (strpos($relativeUrl,'/')===0){
                return parse_url($baseUrl,PHP_URL_SCHEME).'://'.parse_url($baseUrl,PHP_URL_HOST).$relativeUrl;
            }else{
                $baseUrlWords = explode('/',$baseUrl);
                $baseUrlEndWords = array_pop($baseUrlWords);
                return substr($baseUrl,0,strlen($baseUrl)-strlen($baseUrlEndWords)).$relativeUrl;
            }
        }
        //return $relativeUrl;//javascript:
    }

    static function realLinkArray($baseUrl,array $relativeUrls){
        $url = [];
        foreach ($relativeUrls as $relativeUrl){
            $url[] = static::realLink($baseUrl,$relativeUrl);
        }
        return $url;
    }
}