<?php
/**
 * CURLFile
 * CURLFile 应该与选项 CURLOPT_POSTFIELDS 一同使用用于上传文件。
 */

namespace LanguageStatement\UtilComponent\Curl;


class CURLFile extends \CURLFile
{
    /* 属性 */
    public $name ;
    public $mime ;
    public $postname ;
    /* 方法 */
    public function __construct($filename, $mimetype=null, $postname=null){return parent::__construct($filename, $mimetype, $postname);}
    public function getFilename(){return parent::getFilename();}//获取被上传文件的 文件名
    public function getMimeType(){return parent::getMimeType();}//获取被上传文件的 MIME 类型
    public function setMimeType($mime){parent::setMimeType($mime);}//设置被上传文件的 MIME 类型
    public function getPostFilename(){return parent::getPostFilename();}//获取 POST 请求时使用的 文件名
    public function setPostFilename($postname){parent::setPostFilename($postname);}//获取 POST 请求时使用的 文件名
    public function __wakeup(){parent::__wakeup();}//反序列化句柄
}