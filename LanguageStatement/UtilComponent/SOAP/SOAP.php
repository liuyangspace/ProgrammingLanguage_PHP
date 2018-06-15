<?php
/**
 * SOAP
 * The SOAP extension can be used to write SOAP Servers and Clients.
 * It supports subsets of » SOAP 1.1(http://www.w3.org/TR/soap11/),
 * » SOAP 1.2(http://www.w3.org/TR/soap12/) and » WSDL 1.1(http://www.w3.org/TR/wsdl) specifications.
 */

namespace LanguageStatement\UtilComponent\SOAP;


class SOAP
{
    public static $config=[
        'soap.wsdl_cache_enabled',//Enables or disables the WSDL caching feature.
        'soap.wsdl_cache_dir',//Sets the directory name where the SOAP extension will put cache files.
        'soap.wsdl_cache_ttl',//Sets the number of seconds (time to live) that cached files will be used instead of the originals.
        'soap.wsdl_cache'=>[// setting determines the type of caching
            'WSDL_CACHE_NONE',//
            'WSDL_CACHE_DISK',//
            'WSDL_CACHE_MEMORY',//
            'WSDL_CACHE_BOTH',//
        ],
        'soap.wsdl_cache_limit',//Maximum number of in-memory cached WSDL files.
    ];

    public static function is_soap_fault($object){return is_soap_fault($object);}//Checks if a SOAP call has failed
    public static function use_soap_error_handler($handler=true){return use_soap_error_handler($handler);}//Set whether to use the SOAP error handler

}