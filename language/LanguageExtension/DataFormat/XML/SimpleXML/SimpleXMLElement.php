<?php
/**
 * SimpleXMLElement
 * Represents an element in an XML document.
 */

namespace LanguageStatement\LanguageExtension\DataFormat\XML\SimpleXML;


class SimpleXMLElement extends \SimpleXMLElement implements \Traversable
{
    //
    /* final public __construct ( string $data [, int $options = 0 [, bool $data_is_url = false [, string $ns = "" [, bool $is_prefix = false ]]]] ) */
    final public function SimpleXMLElement($data,$options=0,$data_is_url=false,$ns="",$is_prefix=false){return parent::__construct($data,$options,$data_is_url,$ns,$is_prefix);}

    // 节点 命名空间，名称，属性，子节点（可通过成员属性以数组形式访问）
    public function getName(){return parent::getName();}//Gets the name of the XML element
    public function getNamespaces($recursive=false){return parent::getNamespaces($recursive);}//Returns namespaces used in document
    public function getDocNamespaces($recursive=false,$from_root=true){return parent::getDocNamespaces($recursive,$from_root);}//Returns namespaces declared in document
    public function attributes($ns=NULL,$is_prefix=false){return parent::attributes($ns,$is_prefix);}//Identifies an element's attributes
    public function children($ns,$is_prefix=false){return parent::children($ns,$is_prefix);}//Finds children of given node
    public function count(){}//Counts the children of an element

    public function addAttribute($name,$value=null,$namespace=null){parent::addAttribute($name,$value,$namespace);}//Adds an attribute to the SimpleXML element
    public function addChild($name,$value=null,$namespace=null){return parent::addChild($name,$value,$namespace);}//

    public function xpath($path){return parent::xpath($path);}//Runs XPath query on XML data
    public function registerXPathNamespace($prefix,$ns){return parent::registerXPathNamespace($prefix,$ns);}//Creates a prefix/ns context for the next XPath query
    // 输出
    public function asXML($filename=null){return parent::asXML($filename);}//Return a well-formed XML string based on SimpleXML element
    public function saveXML($filename=null){return parent::saveXML($filename);}//别名 SimpleXMLElement::asXML()
    public function __toString(){return parent::__toString();}//Returns the string content
}