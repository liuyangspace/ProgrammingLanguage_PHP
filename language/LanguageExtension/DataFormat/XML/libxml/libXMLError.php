<?php
/**
 * libXMLError
 * http://www.xmlsoft.org/html/libxml-xmlerror.html
 */

namespace LanguageStatement\LanguageExtension\DataFormat\XML\libxml;


class libXMLError extends \libXMLError
{
    /* 属性 */
    public $level ;
    public $code ;
    public $column ;
    public $message ;
    public $file ;
    public $line ;
}