<?php
/**
 * SimpleXML
 * SimpleXML 扩展提供了一个非常简单和易于使用的工具集，
 * 将 XML 转换成一个带有一般属性选择器和数组迭代器的对象。
 */

namespace LanguageStatement\LanguageExtension\DataFormat\XML\SimpleXML;


class SimpleXML
{

    public static $option=[
        'LIBXML_BIGLINES',//Allows line numbers greater than 65535 to be reported correctly.
        'LIBXML_COMPACT',//Activate small nodes allocation optimization
        'LIBXML_DTDATTR',//Default DTD attributes
        'LIBXML_DTDLOAD',//Load the external subset
        'LIBXML_DTDVALID',//Validate with the DTD
        'LIBXML_HTML_NOIMPLIED',//Sets HTML_PARSE_NOIMPLIED flag
        'LIBXML_HTML_NODEFDTD',//Sets HTML_PARSE_NODEFDTD flag, which prevents a default doctype being added when one is not found.
        'LIBXML_NOBLANKS',//Remove blank nodes
        'LIBXML_NOCDATA',//Merge CDATA as text nodes
        'LIBXML_NOEMPTYTAG',//Expand empty tags (e.g. <br/> to <br></br>)
        'LIBXML_NOENT',//Substitute entities
        'LIBXML_NOERROR',//Suppress error reports
        'LIBXML_NONET',//Disable network access when loading documents
        'LIBXML_NOWARNING',//Suppress warning reports
        'LIBXML_NOXMLDECL',//Drop the XML declaration when saving a document
        'LIBXML_NSCLEAN',//Remove redundant namespace declarations
        'LIBXML_PARSEHUGE',//Sets XML_PARSE_HUGE flag, which relaxes any hardcoded limit from the parser
        'LIBXML_PEDANTIC',//Sets XML_PARSE_PEDANTIC flag, which enables pedantic error reporting.
        'LIBXML_XINCLUDE',//Implement XInclude substitution
        // error
        'LIBXML_ERR_ERROR',//A recoverable error
        'LIBXML_ERR_FATAL',//A fatal error
        'LIBXML_ERR_NONE',//No errors
        'LIBXML_ERR_WARNING',//A simple warning
        //
        'LIBXML_VERSION',//libxml version like 20605 or 20617
        'LIBXML_DOTTED_VERSION',//libxml version like 2.6.5 or 2.6.17
    ];
    // 将 DOM，文件，字符串 转换为 SimpleXMLElement
    public static function simplexml_import_dom(\DOMNode $node,$class_name="SimpleXMLElement"){return simplexml_import_dom($node,$class_name);}//Get a SimpleXMLElement object from a DOM node.
    public static function simplexml_load_file($filename,$class_name="SimpleXMLElement",$options=0,$ns="",$is_prefix=false){return simplexml_load_file($filename,$class_name,$options,$ns,$is_prefix);}//Interprets an XML file into an object
    public static function simplexml_load_string($data,$class_name="SimpleXMLElement",$options=0,$ns="",$is_prefix=false){return simplexml_load_string($data,$class_name,$options,$ns,$is_prefix);}//

}