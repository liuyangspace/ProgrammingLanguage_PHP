<?php
/**
 *  单向加密(摘要)：MD4,MD5,crypt,hash,mhash
 *  对称加密：mcrypt_*,
 *  非对称加密：openssl_*,
 * Encryption
 *  加密一般分为对称加密(Symmetric Key Encryption)和非对称加密(Asymmetric Key Encryption)。
 *  对称加密又分为分组加密和序列密码。
 *  分组密码，也叫块加密(block cyphers)，一次加密明文中的一个块。是将明文按一定的位长分组，
 *  明文组经过加密运算得到密文组，密文组经过解密运算（加密运算的逆运算），还原成明文组。
 *  序列密码，也叫流加密(stream cyphers)，一次加密明文中的一个位。是指利用少量的密钥（制乱元素）
 *  通过某种复杂的运算（密码算法）产生大量的伪随机位流，用于对明文位流的加密。
 *  解密是指用同样的密钥和密码算法及与加密相同的伪随机位流，用以还原明文位流。
 *  在分组加密算法中，有ECB,CBC,CFB,OFB这几种算法模式。
 */

namespace LanguageStatement\UtilComponent\Encryption;


class Encryption
{

    public static $constant=[
        'PASSWORD_BCRYPT',//
        'PASSWORD_DEFAULT',//
    ];

    // 加密

    public static $algorithm=[
        'CRYPT_STD_DES',//基于标准 DES 算法的散列使用 "./0-9A-Za-z" 字符中的两个字符作为盐值。
        'CRYPT_EXT_DES',//扩展的基于 DES 算法的散列。其盐值为 9 个字符的字符串，由 1 个下划线后面跟着 4 字节循环次数和 4 字节盐值组成。
        'CRYPT_MD5',//MD5 散列使用一个以 $1$ 开始的 12 字符的字符串盐值。
        'CRYPT_BLOWFISH',//Blowfish 算法使用如下盐值："$2a$"，一个两位 cost 参数，"$" 以及 64 位由 "./0-9A-Za-z" 中的字符组合而成的字符串。
        'CRYPT_SHA256',//SHA-256 算法使用一个以 $5$ 开头的 16 字符字符串盐值进行散列。其他参见手册。
        'CRYPT_SHA512',//SHA-512 算法使用一个以 $6$ 开头的 16 字符字符串盐值进行散列。其他参见手册。
    ];
    public static function crypt($str,$salt){ return crypt($str,$salt); }//一个基于标准 UNIX DES 算法或系统上其他可用的替代算法的散列字符串。

    public static $options=[
        'salt',
        'cost',
    ];
    public static function password_hash($password,$algo,$options){ return password_hash($password,$algo,$options); }//创建密码的哈希（hash）,兼容 crypt()。
    public static function password_verify($password,$hash){ return password_verify($password,$hash); }//验证密码是否和哈希匹配
    public static function password_get_info($hash){return password_get_info($hash);}//Returns information about the given hash
    public static function password_needs_rehash($hash,$algo,$options){return password_needs_rehash($hash,$algo,$options);}//Checks if the given hash matches the given options

    public static function md5($str,$raw_output=false){ return md5($str,$raw_output); }//计算字符串的 MD5 散列值
    public static function md5_file($filename,$raw_output=false){ return md5_file($filename,$raw_output); }//计算文件的 sha1 散列值

    public static function sha1($str,$raw_output=false){ return sha1($str,$raw_output); }//计算字符串的 sha1 散列值
    public static function sha1_file($filename,$raw_output=false){ return sha1_file($filename,$raw_output); }//计算指定文件的 MD5 散列值

}