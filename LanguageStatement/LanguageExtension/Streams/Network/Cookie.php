<?php
/**
 * PHP Cookie
 */

namespace LanguageStatement\LanguageExtension\Streams\Network;


class Cookie
{

    //关于http header 参见Network
    public static function setcookie($name,$value="",$expire=0,$path="",$domain="",$secure=false,$httponly=false){return setcookie($name,$value,$expire,$path,$domain,$secure,$httponly);}//Send a cookie
    public static function setrawcookie($name,$value="",$expire=0,$path="",$domain="",$secure=false,$httponly=false){return setrawcookie($name,$value,$expire,$path,$domain,$secure,$httponly);}//Send a cookie without urlencoding the cookie value

}