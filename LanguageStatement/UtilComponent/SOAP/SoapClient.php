<?php
/**
 * SoapClient
 */

namespace LanguageStatement\UtilComponent\SOAP;


class SoapClient extends \SoapClient
{
    public $options = [
        'location'  => 'the URL of the SOAP server',
        'uri' => 'the target namespace of the SOAP service',
        'style' => '',
        'soap_version' => [SOAP_1_1,SOAP_1_2],
    ];
    public function SoapClient($wsdl,array $options=[]){parent::SoapClient($wsdl,$options);}
    public function __call($function_name,$arguments){}

}