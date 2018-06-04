<?php
/**
 * curl OOP
 */

namespace LanguageStatement\UtilComponent\Curl;


class CurlClass
{
    protected $ch;


    public function __construct($url=NULL)
    {
        $this->ch=curl_init($url);
    }

    protected function listenCurlError($file,$method)
    {
        if(curl_errno($this->ch)){

        }
    }
}