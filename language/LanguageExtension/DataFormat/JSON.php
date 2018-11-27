<?php
/**
 * JSON
 * 解码分析器基于 Douglas Crockford 的 JSON_checker。
 * http://www.json.org
 */

namespace LanguageStatement\LanguageExtension\DataFormat;


class JSON implements \JsonSerializable
{

    public function jsonSerialize(){}//影响json_encode

    const JSON_BIGINT_AS_STRING         = JSON_BIGINT_AS_STRING;//大整形转为字符
    public static function json_decode($json,$assoc=false,$depth=512,$options=0){return json_decode($json,$assoc,$depth,$options);}//对 JSON 格式的字符串进行解码
    const JSON_HEX_TAG                  = JSON_HEX_TAG;//所有的 < 和 > 转换成 \u003C 和 \u003E。
    const JSON_HEX_AMP                  = JSON_HEX_AMP;//所有的 & 转换成 \u0026。
    const JSON_HEX_APOS                 = JSON_HEX_APOS;//所有的 ' 转换成 \u0027。
    const JSON_HEX_QUOT                 = JSON_HEX_QUOT;//所有的 " 转换成 \u0022。
    const JSON_FORCE_OBJECT             = JSON_FORCE_OBJECT;//非关联数组输出一个类（Object）而非数组。
    const JSON_NUMERIC_CHECK            = JSON_NUMERIC_CHECK;//将所有数字字符串编码成数字（numbers）。
    //const JSON_BIGINT_AS_STRING         = JSON_BIGINT_AS_STRING;//将大数字编码成原始字符原来的值。
    const JSON_PRETTY_PRINT             = JSON_PRETTY_PRINT;//用空白字符格式化返回的数据。
    const JSON_UNESCAPED_SLASHES        = JSON_UNESCAPED_SLASHES;//不要编码 /。
    const JSON_UNESCAPED_UNICODE        = JSON_UNESCAPED_UNICODE;//以字面编码多字节 Unicode 字符（默认是编码成 \uXXXX）。
    public static function json_encode($value,$options=0,$depth=512){return json_encode($value,$options,$depth);}//对变量进行 JSON 编码
    const JSON_ERROR_NONE               = JSON_ERROR_NONE;//没有错误发生。自 PHP 5.3.0 起生效。
    const JSON_ERROR_DEPTH              = JSON_ERROR_DEPTH;//到达了最大堆栈深度。自 PHP 5.3.0 起生效。
    const JSON_ERROR_STATE_MISMATCH     = JSON_ERROR_STATE_MISMATCH;//出现了下溢（underflow）或者模式不匹配。
    const JSON_ERROR_CTRL_CHAR          = JSON_ERROR_CTRL_CHAR;//控制字符错误，可能是编码不对。
    const JSON_ERROR_SYNTAX             = JSON_ERROR_SYNTAX;//语法错误。
    const JSON_ERROR_UTF8               = JSON_ERROR_UTF8;//异常的 UTF-8 字符，也许是因为不正确的编码。
    const JSON_ERROR_RECURSION          = JSON_ERROR_RECURSION;//类里含有递归，
    const JSON_ERROR_INF_OR_NAN         = JSON_ERROR_INF_OR_NAN;//includes either NAN or INF
    const JSON_ERROR_UNSUPPORTED_TYPE   = JSON_ERROR_UNSUPPORTED_TYPE;//an unsupported type was given
    public static function json_last_error(){return json_last_error();}//返回最后发生的错误码
    public static function json_last_error_msg(){return json_last_error_msg();}//返回最后发生的错误信息
}