<?php
/**
 * \MongoDB\BSON\Regex
 */

namespace LanguageStatement\LanguageExtension\Database\MongoDB\BSON;


class Regex implements \MongoDB\BSON\Type // \MongoDB\BSON\Regex
{
    public static $flags=[
        'i'=>'Case insensitivity to match upper and lower cases.',
        'm'=>'match at the beginning(^) or end($) of each line for strings with multiline values.',
        'x'=>'“Extended” capability to ignore all white space characters in the $regex pattern unless escaped or included in a character class.',
        's'=>'Allows the dot character (i.e. .) to match all characters including newline characters.',
    ];
    /* 仅做实例引用 Regex ,\MongoDB\BSON\Regex 中不存在此属性 */public $parent;
    final public function __construct($pattern,$flags){$this->parent=new \MongoDB\BSON\Regex($pattern,$flags);}
    final public function __toString(){return $this->parent->__toString();}//Returns the string representation of this Regex
    final public function getFlags(){return $this->parent->getFlags();}//Returns the Regex's flags
    final public function getPattern(){return $this->parent->getPattern();}//Returns the Regex's pattern
}