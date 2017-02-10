<?php
/**
 * libxml
 * http://www.xmlsoft.org/
 */

namespace LanguageStatement\LanguageExtension\DataFormat\XML\libxml;


class libxml
{
    public static function libxml_get_errors(){return libxml_get_errors();}//Retrieve array of errors.
    public static function libxml_get_last_error(){return libxml_get_last_error();}//Retrieve last error from libxml
    public static function libxml_clear_errors(){libxml_clear_errors();}//Clear libxml error buffer

    public static function libxml_disable_entity_loader($disable=true){return libxml_disable_entity_loader($disable);}//Disable the ability to load external entities
    public static function libxml_set_external_entity_loader(callable $resolver_function){libxml_set_external_entity_loader($resolver_function);}//Changes the default external entity loader
    public static function libxml_set_streams_context($streams_context){libxml_set_streams_context($streams_context);}//Set the streams context for the next libxml document load or write
    public static function libxml_use_internal_errors($use_errors=false){libxml_use_internal_errors($use_errors);}//Disable libxml errors and allow user to fetch error information as needed
}