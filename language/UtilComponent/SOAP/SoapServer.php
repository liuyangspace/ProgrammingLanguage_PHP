<?php
/**
 * SoapServer
 */

namespace LanguageStatement\UtilComponent\SOAP;


class SoapServer extends \SoapServer
{
    public static $options = [
        'soap_version' => [
            SOAP_1_1,
            SOAP_1_2,
        ],
        'actor' => '',
        'encoding' => '',
        'uri' => '',
        'send_errors' => FALSE,
        'features' => [
            SOAP_WAIT_ONE_WAY_CALLS,
            SOAP_SINGLE_ELEMENT_ARRAYS,
            SOAP_USE_XSI_ARRAY_TYPE,
        ],
        'cache_wsdl' => [
            WSDL_CACHE_NONE,
            WSDL_CACHE_DISK,
            WSDL_CACHE_MEMORY,
            WSDL_CACHE_BOTH,
        ],
        'classmap' => [
            'WSDL types'=>'PHP classes',
        ],
        'typemap' => [
            'type_name'=>'',
            'type_ns'=>'',
            'from_xml'=>'',
            'to_xml'=>'',
        ],
    ];
    public function __construct(mixed $wsdl , array $options = [] ) { parent::__construct($wsdl,$options); }
    public function SoapServer(mixed $wsdl , array $options = [] ) { parent::SoapServer($wsdl,$options); }
    const SOAP_FUNCTIONS_ALL = SOAP_FUNCTIONS_ALL;//导出所有函数
    public function addFunction($functions){parent::addFunction($functions);}
    public function getFunctions(){return parent::getFunctions();}
    public function addSoapHeader( \SoapHeader $object){parent::addSoapHeader($object);}
    public function fault($code,$string,$actor=null,$details=null,$name=null){parent::fault($code,$string,$actor,$details,$name);}
    public function handle($soap_request=null){parent::handle($soap_request);}
    public function setClass($class_name,...$args){parent::setClass($class_name,$args);}
    public function setObject($object){parent::setObject($object);}
    const SOAP_PERSISTENCE_SESSION = SOAP_PERSISTENCE_SESSION; // SoapServer data persists between requests.
    const SOAP_PERSISTENCE_REQUEST = SOAP_PERSISTENCE_REQUEST; // SoapServer data does not persist between requests.
    public function setPersistence($mode){parent::setPersistence($mode);}

}