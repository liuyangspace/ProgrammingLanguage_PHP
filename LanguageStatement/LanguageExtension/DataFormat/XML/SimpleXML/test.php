<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/2/10
 * Time: 17:18
 */

namespace LanguageStatement\LanguageExtension\DataFormat\XML\SimpleXML;


$xml = <<<XML
<?xml version='1.0' standalone='yes'?>
<movies xmlns:p="http://example.org/ns" xmlns:t="http://example.org/test">
 <p:person id="1">John Doe</p:person>
 <t:person id="2">John Doe</t:person>
 <movie>
  <title>PHP: Behind the Parser</title>
  <characters>
   <character>
    <name>Ms. Coder</name>
    <actor>Onlivia Actora</actor>
   </character>
   <character>
    <name>Mr. Coder</name>
    <actor>El Act&#211;r</actor>
   </character>
  </characters>
  <plot>
   So, this language. It's like, a programming language. Or is it a
   scripting language? All is revealed in this thrilling horror spoof
   of a documentary.
  </plot>
  <great-lines>
   <line>PHP solves all my web problems</line>
  </great-lines>
  <rating type="thumbs">7</rating>
  <rating type="stars">5</rating>
 </movie>
</movies>
XML;


$sxe = new \SimpleXMLElement($xml);//var_dump($sxe);

$namespaces = $sxe->getNamespaces(true);//var_dump($namespaces);

$name=$sxe->getName();//var_dump($name);

$movie=$sxe->movie[0];//var_dump($movie);

$childrenCount=$movie->count();//var_dump($childrenCount);

echo $movie->title[0];
