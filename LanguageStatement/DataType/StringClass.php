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

    // string pack ( string $format [, mixed $args [, mixed $... ]] )
    // array unpack ( string $format , string $data )

    /*
     * PHP字符串函数
     */
    public static function php_eval($str=null){ return eval($str); }//把字符串作为PHP代码执行
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
    // 字符集 编码  ,参见 LanguageExtension/Streams/DataFormat/Url
    public static function utf8_encode($data){ return utf8_encode($data); }//将 ISO-8859-1 编码的字符串转换为 UTF-8 编码
    public static function utf8_decode($data){ return utf8_decode($data); }//将用 UTF-8 方式编码的 ISO-8859-1 字符串转换成单字节的 ISO-8859-1 字符串。
    public static function convert_uuencode($data){ return convert_uuencode($data); }//使用 uuencode 编码一个字符串
    public static function convert_uudecode($data){ return convert_uudecode($data); }//解码一个 uuencode 编码的字符串
    public static function convert_cyr_string($str,$from,$to){ return convert_cyr_string($str,$from,$to); }//将字符由一种 Cyrillic 字符转换成另一种
    public static function base64_encode($data){return base64_encode($data);}//使用 MIME base64 对数据进行编码
    public static function base64_decode($data,$strict=false){return base64_decode($data,$strict);}//对使用 MIME base64 编码的数据进行解码
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
    //弃用
    public static function ereg($pattern,$string,&$regs){ return ereg($pattern,$string,$regs); }//正则表达式匹配
    public static function eregi($pattern,$string,&$regs){ return eregi($pattern,$string,$regs); }//不区分大小写的正则表达式匹配
    public static function ereg_replace($pattern,$replacement,$string){ return ereg_replace($pattern,$replacement,$string); }//正则表达式替换
    public static function eregi_replace($pattern,$replacement,$string){ return eregi_replace($pattern,$replacement,$string); }//不区分大小写的正则表达式替换

}

class PHPStringExtension extends PHPString
{
    /*
     * 基于 iconv 的多字符集支持
     */
    public static function iconv($in_charset,$out_charset,$str){ return iconv($in_charset,$out_charset,$str); }//字符串按要求的字符编码来转换
    public static function iconv_strlen($str,$charset){ return iconv_strlen($str,$charset); }//返回字符串的字符数统计
    public static function iconv_strpos($str,$needle,$offset,$charset){ return iconv_strpos($str,$needle,$offset,$charset); }//Finds position of first occurrence of a needle within a haystack
    public static function iconv_strrpos($str,$needle,$charset){ return iconv_strrpos($str,$needle,$charset); }//Finds the last occurrence of a needle within a haystack
    public static function iconv_substr($str,$offset,$length,$charset){ return iconv_substr($str,$offset,$length,$charset); }//截取字符串的部分
    public static function iconv_set_encoding($type,$charset){ return iconv_set_encoding($type,$charset); }//为字符编码转换设定当前设置
    public static function iconv_get_encoding($type="all"){ return iconv_get_encoding($type); }//获取 iconv 扩展的内部配置变量
    public static function iconv_mime_encode($name,$value,$preferences=NULL){ return iconv_mime_encode($name,$value,$preferences); }//Composes a MIME header field
    public static function iconv_mime_decode($headers,$mode=0,$charset){ return iconv_mime_decode($headers,$mode,$charset); }//解码一个MIME头字段
    public static function iconv_mime_decode_headers($headers,$mode=0,$charset){ return iconv_mime_decode_headers($headers,$mode,$charset); }//一次性解码多个 MIME 头字段

    /*
     *  基于 mbstring 的多字节字符串支持
     */
    public static function mb_language($language){ return mb_language($language); }//设置/获取当前的语言
    public static function mb_get_info($type="all"){ return mb_get_info($type); }//获取 mbstring 的内部设置
    public static function mb_substitute_character($substrchar){ return mb_substitute_character($substrchar); }//设置/获取替代字符
    public static function mb_internal_encoding($charSet){ return mb_internal_encoding($charSet); }//设置/获取内部字符编码
    public static function mb_list_encodings(){ return mb_list_encodings(); }//返回所有支持编码的数组
    public static function mb_output_handler($contents,$status){ return mb_output_handler($contents,$status); }//在输出缓冲中转换字符编码的回调函数
    public static function mb_parse_str($charSet,&$result){ return mb_parse_str($charSet,$result); }//解析 GET/POST/COOKIE 数据并设置全局变量
    // 编码 检测
    public static function mb_check_encoding($str=NULL,$charSet){ return mb_check_encoding($str,$charSet); }//检查字符串在指定的编码里是否有效
    public static function mb_detect_encoding($str,$encoding_list,$strict=false){ return mb_detect_encoding($str,$encoding_list,$strict); }//检测字符的编码
    public static function mb_detect_order($encoding_list){ return mb_detect_order($encoding_list); }//设置/获取 字符编码的检测顺序
    public static function mb_encoding_aliases($charSet){ return mb_encoding_aliases($charSet); }//Get aliases of a known encoding type
    // 编码 转换
    public static function mb_convert_encoding($str,$to,$from){ return mb_convert_encoding($str,$to,$from); }//转换字符的编码
    public static function mb_convert_variables($to,$from,$var){ return mb_convert_variables($to,$from,$var); }//转换一个或多个变量的字符编码
    // 字符操作
    public static function mb_strlen($str,$charSet){ return mb_strlen($str,$charSet); }//获取字符串的长度
    public static function mb_strpos($haystack,$needle,$offset=0,$charSet){ return mb_strpos($haystack,$needle,$offset,$charSet); }//查找字符串在另一个字符串中首次出现的位置
    public static function mb_stripos($haystack,$needle,$offset=0,$charSet){ return mb_stripos($haystack,$needle,$offset,$charSet); }//大小写不敏感地查找字符串在另一个字符串中首次出现的位置
    public static function mb_strripos($haystack,$needle,$offset=0,$charSet){ return mb_strripos($haystack,$needle,$offset,$charSet); }//大小写不敏感地在字符串中查找一个字符串最后出现的位置
    public static function mb_strrpos($haystack,$needle,$offset=0,$charSet){ return mb_strripos($haystack,$needle,$offset,$charSet); }//查找字符串在一个字符串中最后出现的位置
    public static function mb_strstr($haystack,$needle,$before_needle=false,$charSet){ return mb_strstr($haystack,$needle,$before_needle,$charSet); }//查找字符串在另一个字符串里的首次出现
    public static function mb_stristr($haystack,$needle,$before_needle=false,$charSet){ return mb_stristr($haystack,$needle,$before_needle,$charSet); }//大小写不敏感地查找字符串在另一个字符串里的首次出现
    public static function mb_strrchr($haystack,$needle,$before_needle=false,$charSet){ return mb_stristr($haystack,$needle,$before_needle,$charSet); }//查找指定字符在另一个字符串中最后一次的出现
    public static function mb_strrichr($haystack,$needle,$before_needle=false,$charSet){ return mb_strrichr($haystack,$needle,$before_needle,$charSet); }//大小写不敏感地查找指定字符在另一个字符串中最后一次的出现
    public static function mb_split($pattern,$string,$limit=-1){ return mb_split($pattern,$string,$limit); }//使用正则表达式分割多字节字符串
    public static function mb_strcut($str,$start,$length=NULL,$charSet){ return mb_strcut($str,$start,$length,$charSet); }//获取字符的一部分
    public static function mb_strimwidth($str,$start,$width,$trimmarker="",$charSet){ return mb_strimwidth($str,$start,$width,$trimmarker,$charSet); }//获取按指定宽度截断的字符串
    public static function mb_send_mail($to,$subject,$message,$additional_headers=NULL,$additional_parameter=NULL){ return mb_send_mail($to,$subject,$message,$additional_headers,$additional_parameter); }//发送编码过的邮件
    public static function mb_strwidth($str,$charSet){ return mb_strwidth($str,$charSet); }//返回字符串的宽度
    public static function mb_convert_case($str,$mode,$charSet){ return mb_convert_case($str,$mode,$charSet); }//对字符串进行大小写转换
    public static function mb_strtolower($str,$charSet){ return mb_strtolower($str,$charSet); }//使字符串小写
    public static function mb_strtoupper($str,$charSet){ return mb_strtoupper($str,$charSet); }//使字符串小写
    public static function mb_substr($str,$start,$length=NULL,$charSet){ return mb_substr($str,$start,$length,$charSet); }//获取字符串的部分
    public static function mb_substr_count($haystack,$needle,$charSet){ return mb_substr_count($haystack,$needle,$charSet); }//统计字符串出现的次数
    // MIME
    public static function mb_preferred_mime_name($str){ return mb_preferred_mime_name($str); }//获取 MIME 字符串
    public static function mb_decode_mimeheader($str){ return mb_decode_mimeheader($str); }//解码 MIME 头字段中的字符串
    public static function mb_encode_mimeheader($str,$charset,$transfer_encoding="B",$linefeed="\r\n",$indent=0){ return mb_encode_mimeheader($str,$charset,$transfer_encoding,$linefeed,$indent); }//解码 MIME 头字段中的字符串
    // HTML
    public static function mb_http_input($type=""){ return mb_http_input($type); }//检测 HTTP 输入字符编码
    public static function mb_http_output($encoding){ return mb_http_output($encoding); }//设置/获取 HTTP 输出字符编码
    public static function mb_decode_numericentity($str,$convmap,$charSet){ return mb_decode_numericentity($str,$convmap,$charSet); }//根据 HTML 数字字符串解码成字符
    public static function mb_encode_numericentity($str,$convmap,$charSet,$is_hex=FALSE){ return mb_encode_numericentity($str,$convmap,$charSet,$is_hex); }//Encode character to HTML numeric string reference
    //
    public static function mb_convert_kana($str,$option="KV",$charSet){ return mb_convert_kana($str,$option,$charSet); }//日文字符多字节编码转换
    // ereg
    public static function mb_ereg($pattern,$str,&$regs){return mb_ereg($pattern,$str,$regs); }//Regular expression match with multibyte support
    public static function mb_eregi($pattern,$str,&$regs){return mb_eregi($pattern,$str,$regs); }//Regular expression match ignoring case with multibyte support
    public static function mb_eregi_replace($pattern,$replace,$str,$option="msr"){return mb_eregi_replace($pattern,$replace,$str,$option); }//Replace regular expression with multibyte support ignoring case
    public static function mb_ereg_match($pattern,$str,$option="msr"){return mb_ereg_match($pattern,$str,$option); }//Regular expression match for multibyte string
    public static function mb_ereg_replace($pattern,$replace,$str,$option="msr"){return mb_ereg_replace($pattern,$replace,$str,$option); }//Replace regular expression with multibyte support
    public static function mb_ereg_replace_callback($pattern,$callback,$str,$option="msr"){return mb_ereg_replace_callback($pattern,$callback,$str,$option); }//Perform a regular expresssion seach and replace with multibyte support using a callback
    public static function mb_ereg_search($pattern,$option="msr"){return mb_ereg_search($pattern,$option); }//Multibyte regular expression match for predefined multibyte string
    public static function mb_ereg_search_init($str,$pattern,$option="msr"){return mb_ereg_search_init($str,$pattern,$option); }//Setup string and regular expression for a multibyte regular expression match
    public static function mb_ereg_search_pos($pattern,$option="msr"){return mb_ereg_search_pos($pattern,$option); }//Returns position and length of a matched part of the multibyte regular expression for a predefined multibyte string
    public static function mb_ereg_search_regs($pattern,$option="msr"){return mb_ereg_search_regs($pattern,$option); }//Returns the matched part of a multibyte regular expression
    public static function mb_ereg_search_getpos(){return mb_ereg_search_getpos(); }//Returns start point for next regular expression match
    public static function mb_ereg_search_setpos($position){ return mb_ereg_search_setpos($position); }//Set start point of next regular expression match
    public static function mb_ereg_search_getregs(){return mb_ereg_search_getregs(); }//Retrieve the result from the last multibyte regular expression match
    public static function mb_regex_encoding($charSet){return mb_regex_encoding($charSet); }//Set/Get character encoding for multibyte regex
    public static function mb_regex_set_options($options ){return mb_regex_set_options($options); }//Set/Get the default options for mbregex functions

    /**
     * ctype 字符检测
     */
    public static function ctype_alnum($text){return ctype_alnum($text);}//检查提供的text是否全部为字母和(或)数字字符。
    public static function ctype_alpha($text){return ctype_alpha($text);}//查看提供的text里面的所有字符是否只包含字符。
    public static function ctype_cntrl($text){return ctype_cntrl($text);}//查看提供的text里面的所有字符是否都是控制字符。
    public static function ctype_digit($text){return ctype_digit($text);}//查看提供的text里面的所有字符是否都是数字。
    public static function ctype_graph($text){return ctype_graph($text);}//查看提供的text里面的所有字符是否都是可见的。
    public static function ctype_lower($text){return ctype_lower($text);}//查看提供的text里面的所有字符是否都是小写字母。
    public static function ctype_upper($text){return ctype_upper($text);}//查看提供的text里面的所有字符是否都是大写字母。
    public static function ctype_print($text){return ctype_print($text);}//查看提供的text里面的所有字符是否都是可以打印出来。
    public static function ctype_punct($text){return ctype_punct($text);}//查看提供的text里面的所有字符是否不包含空白、数字和字母
    public static function ctype_space($text){return ctype_space($text);}//查看提供的text里面的所有字符是否包含空白。
    public static function ctype_xdigit($text){return ctype_xdigit($text);}//查看提供的text里面的所有字符是否都是十六进制字符串。

    // 加密扩展
}

/**
 * Created by PhpStorm.
 * User: liuyang
 * Git: https://github.com/liuyangspace
 * Date: 2016/12/12
 * Time: 10:32
 */
