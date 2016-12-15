<?php
/*
 * php基础数据类型处理：字符串
 *  PHP 只支持 256 的字符集
 *  string 最大可以达到 2GB
 *  string 中的字符可以通过一个从 0 开始的下标，用类似 array 结构中的方括号包含对应的数字来访问和修改，比如 $str[42]。
 *  字符串转化：
 *      一个布尔值 boolean 的 TRUE 被转换成 string 的 "1", FALSE 被转换成 ""（空字符串）。
 *      数组 array 总是转换成字符串 "Array"。
 *      数值转换注意目标数值的取值范围（PHP_INT_MAX）
 *  字符串可以用 4 种方式表达：
 *      单引号:除 \' 和 \\ 外，不转义不解析变量
 *      双引号:将对一些特殊的字符进行解析：
 *      Heredoc 结构:在 <<< 后要提供一个标识符，然后换行。接下来是字符串 string 本身，最后要用前面定义的标识符作为结束标志。
 *      Nowdoc 结构:nowdoc 结构也用和 heredocs 结构一样的标记 <<<， 但是跟在后面的标识符要用单引号括起来，即 <<<'EOT'。
 * Reference:
 *  http://php.net/manual/zh/language.types.string.php
 */

namespace LanguageStatement\DataType;


class StringClass extends PHPStringExtension
{
    /*
     * 转换为字符串
     */
    public static function toString($var){ return (string)$var; }

    /*
     * 判断是否为字符串
     */
    public static function isString($var){ return is_string($var); }
}

class PHPString
{

    /*
     * 变量转换
     */
    public static function strval($var){ return strval($var); }//将变量解析成字符串
    public static function parse_str($str,&$arr){ parse_str($str,$arr); }//将字符串解析成多个变量
    public static function str_getcsv($str,$delimiter=",",$enclosure='"',$escape="\\"){ str_getcsv($str,$delimiter,$enclosure,$escape); }//解析 CSV 字符串为一个数组
    public static function explode($delimiter,$str,$limit){ return explode($delimiter,$str,$limit); }//使用一个字符串分割另一个字符串
    public static function implode($str,$array){ return implode($str,$array); }//将一个一维数组的值转化为字符串
    public static function join($str,$array){ return join($str,$array); }//别名 implode()
    public static function str_split($str,$length){ return str_split($str,$length); }//将字符串转换为数组

    /*
     * IO
     */
    //  void echo ( string $arg1 [, string $... ] )
    //  int print ( string $arg )
    //  int printf ( string $format [, mixed $args [, mixed $... ]] )
    //  int vprintf ( string $format , array $args )
    //  int vfprintf ( resource $handle , string $format , array $args )
    //  string sprintf ( string $format [, mixed $args [, mixed $... ]] )
    //  string vsprintf ( string $format , array $args )
    //  mixed sscanf ( string $str , string $format [, mixed &$... ] )
    //  mixed fscanf ( resource $handle , string $format [, mixed &$... ] )

    /*
     * PHP字符串函数
     */
    // ??
    public static function setlocale($category,$locale){ return join($category,$locale); }//设置地区信息
    public static function localeconv(){ return localeconv(); }//Get numeric formatting information
    public static function strcoll($left,$right){ return strcoll($left,$right); }//基于区域设置的字符串比较
    public static function nl_langinfo($item){ return nl_langinfo($item); }//Query language and locale information
    // 剪切(单字节) 拼接 替换 填充 复制 随机 反转
    public static function substr($str,$start,$length){ return substr($str,$start,$length); }//返回字符串的子串
    public static function trim($str,$characterMask=" \t\n\r\0\x0B"){ return trim($str,$characterMask); }//去除字符串首尾处的空白字符（或者其他字符）
    public static function ltrim($str,$characterMask=" \t\n\r\0\x0B"){ return ltrim($str,$characterMask); }//删除字符串开头的空白字符（或其他字符）
    public static function rtrim($str,$characterMask=" \t\n\r\0\x0B"){ return rtrim($str,$characterMask); }//删除字符串末端的空白字符（或者其他字符）
    public static function chop($str,$characterMask){ return chop($str,$characterMask); }//rtrim() 的别名
    public static function chunk_split($str,$length=76,$end="\r\n"){ return chunk_split($str,$length,$end); }//将字符串分割成小块
    public static function strtok($str,$token){ return strtok($str,$token); }//标记分割字符串
    public static function strtr($str,$from,$to){ return strtr($str,$from,$to); }//字符替换
    public static function str_replace($search,$replace,$subject,&$count){ return str_replace($search,$replace,$subject,$count); }//子字符串替换
    public static function str_ireplace($search,$replace,$subject,&$count){ return str_ireplace($search,$replace,$subject,$count); }//str_replace() 的忽略大小写版本
    public static function substr_replace($str,$replace,$start,$length){ return substr_replace($str,$replace,$start,$length); }//替换字符串的子串
    public static function str_pad($str,$length,$padStr=" ",$type=STR_PAD_RIGHT){ return str_pad($str,$length,$padStr,$type); }//使用另一个字符串填充字符串为指定长度
    public static function str_repeat($str,$count){ return str_repeat($str,$count); }//重复一个字符串
    public static function str_shuffle($str){ return str_shuffle($str); }//随机打乱一个字符串
    public static function strrev($str){ return strrev($str); }//反转字符串
    public static function wordwrap($str,$width=75,$break="\n",$cut=false){ return wordwrap($str,$width,$break,$cut); }//打断字符串为指定数量的字串
    //查找
    public static function strstr($search,$str,$before_needle=false){ return strstr($search,$str,$before_needle); }//查找字符串的首次出现
    public static function stristr($search,$str,$before_needle=false){ return stristr($search,$str,$before_needle); }//查找字符串的首次出现（不区分大小写）
    public static function strchr($search,$str,$before_needle=false){ return strchr($search,$str,$before_needle); }//查找字符串的首次出现
    public static function strpos($search,$str,$start=0){ return strpos($search,$str,$start); }//查找字符串首次出现的位置
    public static function stripos($search,$str,$start=0){ return stripos($search,$str,$start); }//查找字符串首次出现的位置（不区分大小写）
    public static function strrpos($search,$str,$start=0){ return strrpos($search,$str,$start); }//计算指定字符串在目标字符串中最后一次出现的位置
    public static function strripos($search,$str,$start=0){ return strripos($search,$str,$start); }//计算指定字符串在目标字符串中最后一次出现的位置（不区分大小写）
    public static function strrchr($search,$search){ return strrchr($search,$search); }//查找指定字符在字符串中的最后一次出现
    public static function strpbrk($str,$char_list){ return strpbrk($str,$char_list); }//在字符串中查找一组字符的任何一个字符
    public static function strspn($str,$char_list,$start,$length){ return strspn($str,$char_list,$start,$length); }//计算字符串中全部字符都存在于指定字符集合中的第一段子串的长度。
    // 比较
    public static function strcmp($left,$right){ return strcmp($left,$right); }//二进制安全字符串比较
    public static function strcasecmp($left,$right){ return strcasecmp($left,$right); }//二进制安全比较字符串（不区分大小写）
    public static function strncmp($left,$right,$len){ return strncmp($left,$right,$len); }//二进制安全比较字符串开头的若干个字符
    public static function strncasecmp($left,$right,$len){ return strncasecmp($left,$right,$len); }//二进制安全比较字符串开头的若干个字符（不区分大小写）
    public static function substr_compare($left,$right,$offset,$len,$case_insensitivity=false){ return substr_compare($left,$right,$offset,$len,$case_insensitivity); }//二进制安全比较字符串（从偏移位置比较指定长度）
    public static function strnatcmp($left,$right){ return strnatcmp($left,$right); }//使用"自然顺序"算法比较字符串
    public static function strnatcasecmp($left,$right){ return strnatcasecmp($left,$right); }//使用"自然顺序"算法比较字符串（不区分大小写）
    public static function levenshtein($left,$right,$ins,$rep,$del){ return levenshtein($left,$right,$ins,$rep,$del); }//计算两个字符串之间的编辑距离
    public static function similar_text($left,$right,&$percent){ return similar_text($left,$right,$percent); }//计算两个字符串的相似度
    public static function strcspn($left,$right,$start,$length){ return strcspn($left,$right,$start,$length); }//获取不匹配遮罩的起始子字符串的长度
    public static function soundex($str){ return soundex($str); }//Calculate the soundex key of a string
    public static function metaphone($str,$phonemes=0){ return metaphone($str,$phonemes); }//Calculate the metaphone key of a string
    public static function hash_equals($knownStr,$userStr){ return hash_equals($knownStr,$userStr); }//可防止时序攻击的字符串比较
    // 大小写
    public static function lcfirst($str){ return lcfirst($str); }//使一个字符串的第一个字符小写
    public static function ucfirst($str){ return ucfirst($str); }//将字符串的首字母转换为大写
    public static function ucwords($str){ return ucwords($str); }//将字符串中每个单词的首字母转换为大写
    public static function strtolower($str){ return strtolower($str); }//将字符串转化为小写
    public static function strtoupper($str){ return strtoupper($str); }//将字符串转化为大写
    // 统计
    public static function strlen($str){ return strlen($str); }//获取字符串长度
    public static function substr_count($search,$str,$offset,$length){ return substr_count($search,$str,$offset,$length); }//计算字串出现的次数
    public static function count_chars($str,$mode=0){ return count_chars($str,$mode); }//统计字节值（0..255）出现的次数
    public static function str_word_count($str,$format=0,$charlist=""){ return str_word_count($str,$format,$charlist); }//统计 string 中单词的数量。
    // char
    public static function chr($asciiInt){ return chr($asciiInt); }//返回指定的字符
    public static function ord($char){ return ord($char); }//返回字符的 ASCII 码值
    // 转义 反转义
    public static function addcslashes($str,$charList){ return addcslashes($str,$charList);}//以 C 语言风格使用反斜线转义字符串中的字符
    public static function stripcslashes($str){ return stripcslashes($str);}//反引用一个使用 addcslashes() 转义的字符串
    public static function stripslashes($str){ return stripslashes($str);}//返回一个去除转义反斜线后的字符串（\' 转换为 ' 等等）。双反斜线（\\）被转换为单个反斜线（\）。
    public static function addslashes($str){ return addslashes($str);}//转义单引号（'）、双引号（"）、反斜线（\）与 NUL（NULL 字符）。
    public static function quotemeta($str){ return quotemeta($str);}//转义 . \ + * ? [ ^ ] ( $ )
    public static function preg_quote($str,$delimiter=NULL){ return preg_quote($str,$delimiter);}//转义正则表达式字符 . \ + * ? [ ^ ] $ ( ) { } = ! < > | : -
    public static function escapeshellcmd($str){ return escapeshellcmd($str);}//shell 元字符转义  #&;`|*?~<>^()[]{}$\, \x0A 和 \xFF。
    // html 文本操作
    public static function nl2br($str,$is_xhtml=true){ return nl2br($str,$is_xhtml); }// \n to <br/>
    public static function stripTags($str,$allowableTags=''){ return strip_tags($str,$allowableTags); }// 从字符串中去除 HTML 和 PHP 标记
    // html实体
    public static function htmlspecialchars($str,$flags=ENT_COMPAT|ENT_HTML401,$encoding='UTF-8',$double_encode=true ){ return htmlspecialchars($str,$flags,$encoding,$double_encode); }//特殊字符转为html实体
    public static function htmlspecialchars_decode($str,$flags=ENT_COMPAT|ENT_HTML401){ return htmlspecialchars_decode($str,$flags); }//将特殊的 HTML 实体转换回普通字符
    public static function htmlentities($str,$flags=ENT_COMPAT|ENT_HTML401,$encoding='UTF-8',$double_encode=true ){ return htmlentities($str,$flags,$encoding,$double_encode); }//所有字符转为html实体
    public static function html_entity_decode($str,$flags=ENT_COMPAT|ENT_HTML401,$encoding='UTF-8' ){ return html_entity_decode ($str,$flags,$encoding); }//html实体转为所有字符
    public static function get_html_translation_table($table=HTML_SPECIALCHARS,$flags=ENT_COMPAT|ENT_HTML401,$encoding='UTF-8'){ return get_html_translation_table($table,$flags,$encoding); }//返回使用 htmlspecialchars() 和 htmlentities() 后的转换表
    // 字符集 编码
    public static function convert_uuencode($data){ return convert_uuencode($data); }//使用 uuencode 编码一个字符串
    public static function convert_uudecode($data){ return convert_uudecode($data); }//解码一个 uuencode 编码的字符串
    public static function convert_cyr_string($str,$from,$to){ return convert_cyr_string($str,$from,$to); }//将字符由一种 Cyrillic 字符转换成另一种
    public static function crc32($str){ return crc32($str); }//计算一个字符串的 crc32 多项式
    public static function hebrev($hebrew_text,$max_chars_per_line=0){ return hebrev($hebrew_text,$max_chars_per_line); }//将逻辑顺序希伯来文（logical-Hebrew）转换为视觉顺序希伯来文（visual-Hebrew）
    public static function hebrevc($hebrew_text,$max_chars_per_line=0){ return hebrevc($hebrew_text,$max_chars_per_line); }//将逻辑顺序希伯来文（logical-Hebrew）转换为视觉顺序希伯来文（visual-Hebrew），并且转换换行符
    public static function quoted_printable_decode($str){ return quoted_printable_decode($str); }//将 quoted-printable 字符串转换为 8-bit 字符串
    public static function quoted_printable_encode($str){ return quoted_printable_encode($str); }//将 8-bit 字符串转换成 quoted-printable 字符串
    public static function str_rot13($str){ return str_rot13($str); }//对字符串执行 ROT13 转换
    // 加密
    public static function crypt($str,$salt){ return crypt($str,$salt); }//计算一个字符串的 crc32 多项式
    public static function password_hash($password,$algo,$options){ return password_hash($password,$algo,$options); }//创建密码的哈希（hash）
    public static function password_verify($password,$hash){ return password_verify($password,$hash); }//验证密码是否和哈希匹配
    public static function md5($str,$raw_output=false){ return md5($str,$raw_output); }//计算字符串的 MD5 散列值
    public static function md5_file($filename,$raw_output=false){ return md5_file($filename,$raw_output); }//计算文件的 sha1 散列值
    public static function sha1($str,$raw_output=false){ return sha1($str,$raw_output); }//计算字符串的 sha1 散列值
    public static function sha1_file($filename,$raw_output=false){ return sha1_file($filename,$raw_output); }//计算指定文件的 MD5 散列值

    /*
     * 正则
     */
    //兼容 Perl
    public static function preg_grep($pattern,$input,$flags=0){ return preg_grep($pattern,$input,$flags); }//返回匹配模式的数组条目
    public static function preg_filter($pattern,$replace,$subject,$limit=-1,&$count){ return preg_filter($pattern,$replace,$subject,$limit,$count); }//执行一个正则表达式搜索和替换
    public static function preg_match_all($pattern,$subject,&$matches,$flags=PREG_PATTERN_ORDER,$offset=0){ return preg_match_all($pattern,$subject,$matches,$flags,$offset); }//执行一个全局正则表达式匹配
    public static function preg_match($pattern,$subject,&$matches,$flags=0,$offset=0){ return preg_match($pattern,$subject,$matches,$flags,$offset); }//执行一个正则表达式匹配
    public static function preg_replace_callback_array($pattern,$subject,$limit=-1,&$count){ return preg_replace_callback_array($pattern,$subject,$limit,$count); }//Perform a regular expression search and replace using callbacks
    public static function preg_replace_callback($pattern,$callback,$subject,$limit=-1,&$count){ return preg_replace_callback($pattern,$callback,$subject,$limit,$count); }//执行一个正则表达式搜索并且使用一个回调进行替换
    public static function preg_replace($pattern,$replace,$subject,$limit=-1,&$count){ return preg_replace($pattern,$replace,$subject,$limit,$count); }//执行一个正则表达式的搜索和替换
    public static function preg_split($pattern,$subject,$limit=-1,&$count){ return preg_split($pattern,$subject,$limit,$count); }//通过一个正则表达式分隔字符串
    public static function preg_last_error(){ return preg_last_error(); }//返回最后一个PCRE正则执行产生的错误代码
    //
    public static function ereg($pattern,$string,&$regs){ return ereg($pattern,$string,$regs); }//正则表达式匹配
    public static function eregi($pattern,$string,&$regs){ return eregi($pattern,$string,$regs); }//不区分大小写的正则表达式匹配
    public static function ereg_replace($pattern,$replacement,$string){ return ereg_replace($pattern,$replacement,$string); }//正则表达式替换
    public static function eregi_replace($pattern,$replacement,$string){ return eregi_replace($pattern,$replacement,$string); }//不区分大小写的正则表达式替换


/*
 某些函数假定字符串是以单字节编码的，但并不需要将字节解释为特定的字符。例如 substr()，strpos()，strlen() 和 strcmp()。理解这些函数的另一种方法是它们作用于内存缓冲区，即按照字节和字节下标操作。
某些函数被传递入了字符串的编码方式，也可能会假定默认无此信息。例如 htmlentities() 和 mbstring 扩展中的大部分函数。
其它函数使用了当前区域（见 setlocale()），但是逐字节操作。例如 strcasecmp()，strtoupper() 和 ucfirst()。这意味着这些函数只能用于单字节编码，而且编码要与区域匹配。例如 strtoupper("á") 在区域设定正确并且 á 是单字节编码时会返回 "Á"。如果是用 UTF-8 编码则不会返回正确结果，其结果根据当前区域有可能返回损坏的值。
最后一些函数会假定字符串是使用某特定编码的，通常是 UTF-8。intl 扩展和 PCRE（上例中仅在使用了 u 修饰符时）扩展中的大部分函数都是这样。尽管这是由于其特殊用途，utf8_decode() 会假定 UTF-8 编码而 utf8_encode() 会假定 ISO-8859-1 编码。
要使用来自于 intl 和 mbstring 扩展的函数。
exec,system, passthru()
*/
}

class PHPStringExtension extends PHPString
{
    // iconv_*

    // mb_*

    // url

    // 加密扩展
}

/**
 * Created by PhpStorm.
 * User: liuyang
 * Git: https://github.com/liuyangspace
 * Date: 2016/12/12
 * Time: 10:32
 * Description: php基础数据类型处理：字符串
 * Reference:
 *  http://php.net/manual/zh/language.types.string.php
 */
