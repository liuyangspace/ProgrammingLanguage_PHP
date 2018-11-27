<?php
/**
 * 基于curl的远程访问
 * 封装了常用操作
 *  http: head,get,post (简单支持https)
 */

class CurlPlus
{
    public static $proxy = '';

    const DEFAULT_USER_AGENT='';

    /**
     * http get 请求
     * @param string $url
     * @param array $params
     * @param bool $urlEncode
     * @param int $timeout
     * @param null $userAgent
     * @param null $acceptEncoding
     * @param null $user
     * @param null $password
     * @param array $heard
     * @param bool $getHeard
     * @param bool $throw
     * @return mixed
     * @throws \Exception
     */
    public static function httpGet(
        $url,
        $params=[],
        $urlEncode=TRUE,
        $throw=TRUE
    ){
        $url = self::urlHandler($url,$params,$urlEncode);

        $ch = curl_init($url);

        curl_setopt($ch,CURLOPT_AUTOREFERER,TRUE);
        curl_setopt($ch,CURLOPT_FOLLOWLOCATION,TRUE);
        curl_setopt($ch,CURLOPT_MAXREDIRS,8);

        curl_setopt($ch,CURLOPT_RETURNTRANSFER,TRUE);
        curl_setopt($ch,CURLOPT_HEADER,FALSE);

        curl_setopt($ch,CURLOPT_HTTPGET,TRUE);

        if(static::$proxy) curl_setopt($ch,CURLOPT_PROXY,static::$proxy);

        if(strpos($url,'https://')===0) {
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE); // 跳过证书检查
            curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE); // 从证书中检查SSL加密算法是否存在
        }

        curl_setopt($ch,CURLOPT_USERAGENT,"Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 1.1.4322; .NET CLR 2.0.50727)");

        $result=curl_exec($ch);

        if(curl_errno($ch)!==0 && $throw){
            throw new \Exception(curl_error($ch));
        }
        return $result;
    }

    /**
     * @param string $proxy
     */
    public static function setProxy($proxy)
    {
        static::$proxy = $proxy;
    }

    /**
     * 提取出url中的参数，返回关联数组
     * @param $url
     * @return array
     */
    public static function getUrlParams($url)
    {
        $params=parse_url($url,PHP_URL_QUERY);
        $params=preg_replace('/^#.*?%/','',$params);
        $params=explode('&',$params);
        $paramsArr=[];
        array_walk($params,function(&$value,$key)use(&$paramsArr){
            $keyValue=explode('=',$value);
            if(count($keyValue)==2){
                $paramsArr[$keyValue[0]]=$keyValue[1];
            }
        });
        return $paramsArr;
    }

    /**
     * 对url做处理：
     *      1，过滤非法的键值对
     *      2，将参数数组融入url
     *      3，对url参数中的value做urlencode
     * @param string $url
     * @param array $params
     * @param bool $urlEncode
     * @return mixed|string 处理好的url
     */
    public static function urlHandler(
        $url,
        $params=[],
        $urlEncode=FALSE
    ){
        $urlParams=self::getUrlParams($url);
        if(is_array($params)){
            $allParams=array_merge($urlParams,$params);
        }else{
            $allParams=$urlParams;
        }
        if($urlEncode){
            array_walk($allParams,function(&$value,$key){
                $value=urlencode($value);
            });
        }
        $paramsStr='';
        array_walk($allParams,function(&$value,$key)use(&$paramsStr){
            $paramsStr.=$key.'='.$value.'&';
        });
        $paramsStr=trim($paramsStr,'&');
        $fragment=parse_url($url,PHP_URL_FRAGMENT);
        $url=str_replace(parse_url($url,PHP_URL_QUERY),$paramsStr,$url);
        if($fragment){
            $url=$url.'#'.$fragment;
        }
        return $url;
    }

    /**
     * curl常用设置：
     *
     * @param $ch
     * @param int $timeout
     * @param null $userAgent
     * @param null $acceptEncoding
     * @param null $user
     * @param null $password
     * @param array $heard
     * @param bool $getHeard
     * @return mixed
     */
    public static function generalCurlSet(
        $ch,
        $timeout=15,
        $userAgent=NULL,
        $acceptEncoding=NULL,
        $user=NULL,
        $password=NULL,
        $heard=[],
        $getHeard=FALSE
    ){
        curl_setopt($ch,CURLOPT_CONNECTTIMEOUT,$timeout);
        //curl_setopt($ch,CURLOPT_TIMEOUT,$timeout);
        if($getHeard) curl_setopt($ch,CURLOPT_HEADER,TRUE);
        if($userAgent) curl_setopt($ch,CURLOPT_USERAGENT,$userAgent);
        if($acceptEncoding) curl_setopt($ch,CURLOPT_ENCODING,$acceptEncoding);
        if($heard) curl_setopt($ch,CURLOPT_HTTPHEADER,$heard);
        if($user!==NULL&&$password!==NULL) curl_setopt($ch,CURLOPT_USERPWD,$user.':'.$password);

        curl_setopt($ch,CURLOPT_RETURNTRANSFER,TRUE);

        // SSL(简单配置)
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 2);

        return $ch;
    }

}