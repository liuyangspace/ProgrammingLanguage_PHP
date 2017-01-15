<?php

//include(__DIR__.'/LanguageStatement/LanguageStatement.php');
//include(__DIR__.'/LanguageStatement/LanguageRegulate.php');
//include(__DIR__.'/LanguageStatement/UtilComponent/DataTypeUtil/StringClass.php');
//include(__DIR__.'/LanguageStatement/UtilComponent/DataTypeUtil/ArrayClass.php');
include(__DIR__.'/LanguageStatement/DataType/Dictionary.php');
include(__DIR__.'/LanguageStatement/DataType/Iterator.php');
include(__DIR__.'/LanguageStatement/DataType/Enum.php');
//include(__DIR__.'/LanguageStatement/DataType/ListClass.php');
include(__DIR__.'/LanguageStatement/DataType/Stack.php');
include(__DIR__.'/LanguageStatement/DataType/Queue.php');
include(__DIR__.'/LanguageStatement/DataType/Tree.php');

//$command=`whoami`;

//$a=mb_list_encodings();
//$a=mb_internal_encoding();
//$a=mb_detect_encoding('��ʵ��ʵ��ʦ', mb_list_encodings());
//$a='对方水电费';
//var_dump($a);
//$a=\LanguageStatement\UtilComponent\DataTypeUtil\StringClass::convertEncoding('对方水电费','GBK');
//$a=mb_convert_encoding('对方水电费','GB2312','UTF-8');
//$a=mb_detect_encoding('�?�?�??�??��?�令�?�?�??��?��?�???�?�??',mb_list_encodings());
//$a=[1,2,'a'=>3,4=>'b'];
//$a=\LanguageStatement\UtilComponent\DataTypeUtil\ArrayClass::arrayToJson($a);
//var_dump($a);
$a = "new string";
$c = $b = $a;
//xdebug_debug_zval( 'a' );
//unset( $b, $c );
//xdebug_debug_zval( 'a' );
//var_dump(realpath('test.php'));
$a=['as','a'=>123,78];
//echo json_encode($a,JSON_PRETTY_PRINT);
//spl_autoload_register();
//var_dump(spl_classes());
//$stream=fopen('notes.txt','r+');
//stream_set_read_buffer($stream,1024);
//var_dump(fread($stream,1024));
//var_dump(fwrite($stream,' streams '));
//fclose($stream);
//var_dump(stream_context_get_default());
$url = 'http://username:password@hostname/path?arg=value#anchor';
$url = 'http://www.baidu.com/path?arg=value#anchor';
//print_r(parse_url($url));

//$a=namespace\LanguageStatement\LanguageStatement::$magicMethods;
//var_dump($a);
//$d=new \LanguageStatement\DataType\Dictionary([1,'2','a','b'=>'c','3'=>'test1','e'=>[4,5]]);
//$d->set('4','test2');
//var_dump(count($d));
//var_dump($d->get('e'));
//echo $d->get('e');
//$c=[];
//$c[$d]=1;
//$a=1;
//$s=new \LanguageStatement\DataType\Tree(1,$a);
class A implements  \OuterIterator
{
    protected $container=[1,2,3];
    protected $pointer=0;

    public function current()
    {
        return $this->container[$this->pointer];
    }
    public function key()
    {
        return $this->pointer;
    }
    public function valid()
    {
        return array_key_exists($this->pointer, $this->container);
    }
    public function next()
    {
        $this->pointer++;
    }
    public function rewind()
    {
        $this->pointer=0;
    }
    public function getInnerIterator()
    {
        return $this->container[$this->pointer];
    }
}
$a=new A();
var_dump($a->getInnerIterator());
var_dump($a->getInnerIterator());
foreach($a as $value){
//    foreach($value as $v){
//        //$v->getInnerIterator();
//        //var_dump($v);
//    }
    //var_dump($value);
}


