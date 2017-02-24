<?php
/**
 * 基于curl的远程访问
 * 封装了常用操作
 *  http: head,get,post (简单支持https)
 */

namespace LanguageStatement\UtilComponent\Curl;


class CurlPlus
{

    const DEFAULT_USER_AGENT='';
    protected static $userAgent='';

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
        $urlEncode=true,
        $timeout=15,
        $userAgent=null,
        $acceptEncoding=null,
        $user=null,
        $password=null,
        $heard=[],
        $getHeard=false,
        $throw=false
    ){
        $url = self::urlHandler($url,$params,$urlEncode);

        $ch = curl_init($url);

        $ch = self::generalCurlSet($ch,$timeout, $userAgent, $acceptEncoding, $user, $password, $heard, $getHeard);

        curl_setopt($ch,CURLOPT_HTTPGET,true);

        $result=curl_exec($ch);

        if(curl_errno($ch)!==0 && $throw){
            throw new \Exception(curl_error($ch));
        }
        return $result;
    }

    /**
     * http post 请求
     * @param $url
     * @param array $params
     * @param array|string $files
     *      可以是文件路径 或 多个文件路径组成的数组
     *      或 array(
     *          [
     *              'filename'=>'a.jpg',//文件路径
     *              'mimetype'=>'image/jpg',//文件的 MIME 类型。
     *              'postname'=>'b.jpg',//被上传文件的 文件名。
     *          ],...
     *      )
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
    public static function httpPost(
        $url,
        $params=[],
        $files=[],
        $urlEncode=true,
        $timeout=15,
        $userAgent=null,
        $acceptEncoding=null,
        $user=null,
        $password=null,
        $heard=[],
        $getHeard=false,
        $throw=true
    ){
        //$urlParams = self::getUrlParams($url);
        //$params = array_merge($params,$urlParams);
        if($urlEncode){
            $url = self::urlHandler($url,[],$urlEncode);
        }

        $ch = curl_init($url);

        $ch = self::generalCurlSet($ch,$timeout, $userAgent, $acceptEncoding, $user, $password, $heard, $getHeard);

        if(is_string($files)){
            $files[]=$files;
        }
        if(is_array($files)){
            array_walk($files,function(&$value,$key){
                if(is_array($value)){
                    if( isset($value['filename']) && isset($value['mimetype']) && isset($value['postname']) ){
                        $value=new \CURLFile($value['filename'],$value['mimetype'],$value['postname']);
                    }
                }elseif(is_string($value)){
                    if(extension_loaded('fileinfo')){
                        $fileinfo=new \finfo(FILEINFO_MIME_TYPE);
                        $value=new \CURLFile($value,$fileinfo->file($value),basename($value));
                    }else{
                        $value=new \CURLFile($value);
                    }
                }
            });
        }
        $params = array_merge($params,$files);
        curl_setopt($ch,CURLOPT_POST,true);
        curl_setopt($ch,CURLOPT_SAFE_UPLOAD,true);
        //curl_setopt($ch,CURLOPT_UPLOAD,true);
        curl_setopt($ch,CURLOPT_POSTFIELDS,$params);

        $result=curl_exec($ch);

        if(curl_errno($ch)!==0 && $throw){
            throw new \Exception(curl_error($ch));
        }
        return $result;
    }

    /**
     * http head 请求
     * @param $url
     * @param array $params
     * @param bool $urlEncode
     * @param int $timeout
     * @param null $userAgent
     * @param null $acceptEncoding
     * @param null $user
     * @param null $password
     * @param bool $getHeard
     * @param bool $throw
     * @return bool
     * @throws \Exception
     */
    public static function httpHead(
        $url,
        $params=[],
        $urlEncode=true,
        $timeout=15,
        $userAgent=null,
        $acceptEncoding=null,
        $user=null,
        $password=null,
        $getHeard=false,
        $throw=false
    ){
        $url = self::urlHandler($url,$params,$urlEncode);

        $ch = curl_init($url);

        $ch = self::generalCurlSet($ch,$timeout, $userAgent, $acceptEncoding, $user, $password, [], $getHeard);

        curl_setopt($ch,CURLOPT_NOBODY,true);

        curl_exec($ch);

        if(curl_errno($ch)!==0){
            if($throw){
                throw new \Exception(curl_error($ch));
            }else{
                return false;
            }

        }else{
            return true;
        }
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
        $urlEncode=false
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
        $userAgent=null,
        $acceptEncoding=null,
        $user=null,
        $password=null,
        $heard=[],
        $getHeard=false
    ){
        curl_setopt($ch,CURLOPT_CONNECTTIMEOUT,$timeout);
        //curl_setopt($ch,CURLOPT_TIMEOUT,$timeout);
        if($getHeard) curl_setopt($ch,CURLOPT_HEADER,true);
        if($userAgent) curl_setopt($ch,CURLOPT_USERAGENT,$userAgent);
        if($acceptEncoding) curl_setopt($ch,CURLOPT_ENCODING,$acceptEncoding);
        if($heard) curl_setopt($ch,CURLOPT_HTTPHEADER,$heard);
        if($user!==null&&$password!==null) curl_setopt($ch,CURLOPT_USERPWD,$user.':'.$password);

        curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);

        // SSL
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 2);

        return $ch;
    }

}