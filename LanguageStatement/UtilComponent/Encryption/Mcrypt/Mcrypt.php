<?php
/**
 * Mcrypt
 * 本扩展是 mcrypt 库的接口，
 * mcrypt 库提供了对多种块算法的支持， 包括：DES，TripleDES，Blowfish （默认），
 * 3-WAY，SAFER-SK64，SAFER-SK128，TWOFISH，TEA，RC2 以及 GOST，
 * 并且支持 CBC，OFB，CFB 和 ECB 密码模式。
 * 甚至，它还支持诸如 RC6 和 IDEA 这两种"非免费"的算法。
 * 默认情况下，CFB/OFB 是 8 比特的。
 * Mcrypt 支持以下四种分组密码模式：CBC， OFB，CFB 和 ECB。
 * 如果使用 libmcrypt-2.4.x 或更高版本链接， 还可以支持 nOFB 分组模式 和 流 模式。
 */

namespace LanguageStatement\UtilComponent\Encryption\Mcrypt;


class Mcrypt
{
    public static $config=[
        'mcrypt.algorithms_dir',//包含算法的目录。 默认情况向是 libmcrypt 的编译目录， 通常是 /usr/local/lib/libmcrypt。
        'mcrypt.modes_dir',//包含模式的目录。 默认情况向是 libmcrypt 的编译目录， 通常是 /usr/local/lib/libmcrypt
    ];

    public static $constant=[
        'mode'=>[
            'MCRYPT_MODE_ECB',//(electronic codebook) 适用于随机数据， 比如可以用这种模式来加密其他密钥。 由于要加密的数据很短，并且是随机的，所以这种模式的缺点反而起到了积极的作用。
            'MCRYPT_MODE_CBC',//(cipher block chaining) 特别适用于对文件进行加密。 相比 ECB， 它的安全性有明显提升。
            'MCRYPT_MODE_CFB',//(cipher feedback) 对于每个单独的字节都进行加密， 所以非常适用于针对字节流的加密。
            'MCRYPT_MODE_OFB',//(output feedback, in 8bit) 和 CFB 类似。 它可以用在无法容忍加密错误传播的应用中。 因为它是按照 8 个比特位进行加密的， 所以安全系数较低，不建议使用。
            'MCRYPT_MODE_NOFB',//(output feedback, in nbit) 和 OFB 类似，但是更加安全， 因为它可以按照算法指定的分组大小来对数据进行加密。
            'MCRYPT_MODE_STREAM',//是一种扩展模式， 它包含了诸如 "WAKE" 或 "RC4" 的流加密算法。
        ],
        'algorithm'=>[
            '',// 详见 algorithm
        ]
    ];

    // 算法 和 模式 （聚合模式的算法资源）
    public static function mcrypt_module_open($algorithm,$algorithm_directory,$mode,$mode_directory){return mcrypt_module_open($algorithm,$algorithm_directory,$mode,$mode_directory);}//打开算法和模式对应的模块
    public static function mcrypt_module_close($td){return mcrypt_module_close($td);}//关闭加密模块

    public static function mcrypt_enc_get_iv_size($td){return mcrypt_enc_get_iv_size($td);}//返回打开的算法的初始向量大小
    public static function mcrypt_enc_get_block_size($td){return mcrypt_enc_get_block_size($td);}//返回打开的算法的分组大小
    public static function mcrypt_enc_get_key_size($td){return mcrypt_enc_get_key_size($td);}//返回打开的模式所能支持的最长密钥
    public static function mcrypt_enc_get_supported_key_sizes($td){return mcrypt_enc_get_supported_key_sizes($td);}//以数组方式返回打开的算法所支持的密钥长度
    public static function mcrypt_enc_get_algorithms_name($td){return mcrypt_enc_get_algorithms_name($td);}//返回打开的算法名称
    public static function mcrypt_enc_get_modes_name($td){return mcrypt_enc_get_modes_name($td);}//返回打开的模式的名称
    public static function mcrypt_enc_is_block_algorithm($td){return mcrypt_enc_is_block_algorithm($td);}//检测打开模式的算法是否为分组算法
    public static function mcrypt_enc_is_block_algorithm_mode($td){return mcrypt_enc_is_block_algorithm_mode($td);}//检测打开的模式是否支持分组加密
    public static function mcrypt_enc_is_block_mode($td){return mcrypt_enc_is_block_mode($td);}//检测打开的模式是否以分组方式输出
    public static function mcrypt_enc_self_test($td){return mcrypt_enc_self_test($td);}//在打开的模块上进行自检
    // 算法 模式 (名称)
    public static function mcrypt_list_algorithms($lib_dir=null){return mcrypt_list_algorithms($lib_dir);}//获取支持的加密算法
    public static function mcrypt_list_modes($lib_dir=null){return mcrypt_list_modes($lib_dir);}//获取所支持的模式

    public static function mcrypt_module_self_test($algorithm,$lib_dir){return mcrypt_module_self_test($algorithm,$lib_dir);}//在指定模块上执行自检
    public static function mcrypt_get_cipher_name($algorithm){return mcrypt_get_cipher_name($algorithm);}//获取加密算法名称
    public static function mcrypt_get_block_size($algorithm){return mcrypt_get_block_size($algorithm);}//获得加密算法的分组大小
    public static function mcrypt_get_key_size($algorithm,$mode){return mcrypt_get_key_size($algorithm,$mode);}//获取指定加密算法的密钥大小
    public static function mcrypt_module_get_algo_block_size($algorithm,$lib_dir){return mcrypt_module_get_algo_block_size($algorithm,$lib_dir);}//返回指定算法的分组大小
    public static function mcrypt_module_get_algo_key_size($algorithm,$lib_dir){return mcrypt_module_get_algo_key_size($algorithm,$lib_dir);}//获取打开模式所支持的最大密钥大小
    public static function mcrypt_module_get_supported_key_sizes($algorithm,$lib_dir){return mcrypt_module_get_supported_key_sizes($algorithm,$lib_dir);}//以数组形式返回打开的算法所支持的密钥大小

    public static function mcrypt_module_is_block_mode($mode,$lib_dir){return mcrypt_module_is_block_mode($mode,$lib_dir);}//检测指定模式是否以分组方式输出
    public static function mcrypt_module_is_block_algorithm($algorithm,$lib_dir){return mcrypt_module_is_block_algorithm($algorithm,$lib_dir);}//检测指定算法是否为分组加密算法
    public static function mcrypt_module_is_block_algorithm_mode($mode,$lib_dir){return mcrypt_module_is_block_algorithm_mode($mode,$lib_dir);}//返回指定模块是否是分组加密模式
    // 初始向量
    public static function mcrypt_create_iv($size,$source=MCRYPT_DEV_URANDOM){return mcrypt_create_iv($size,$source);}//从随机源创建初始向量
    public static function mcrypt_get_iv_size($algorithm,$mode){return mcrypt_get_iv_size($algorithm,$mode);}//返回指定算法/模式组合的初始向量大小
    // 加密 解密
    public static function mcrypt_generic_init($td,$key,$iv){return mcrypt_generic_init($td,$key,$iv);}//初始化加解密所需的缓冲区
    public static function mcrypt_generic($td,$data){return mcrypt_generic($td,$data);}//加密数据,传入数据长度必须是 n * 分组大小，否则需要后补 "\0"。
    public static function mdecrypt_generic($td,$data){return mdecrypt_generic($td,$data);}//解密数据,使用 rtrim($str, "\0") 移除字符串末尾的 0 。
    public static function mcrypt_generic_deinit($td){return mcrypt_generic_deinit($td);}//对加密模块进行清理工作

    public static function mcrypt_encrypt($algorithm,$key,$data,$mode,$iv=null){return mcrypt_encrypt($algorithm,$key,$data,$mode,$iv);}//使用给定参数加密明文
    public static function mcrypt_decrypt($algorithm,$key,$data,$mode,$iv=null){return mcrypt_decrypt($algorithm,$key,$data,$mode,$iv);}//使用给定参数解密密文


    // 函数不应再使用了， 请使用 mcrypt_generic() 和 mdecrypt_generic() 作为替代。
    public static function mcrypt_cbc($algorithm,$key,$data,$mode,$iv=null){return mcrypt_cbc($algorithm,$key,$data,$mode,$iv);}//以 CBC 模式加解密数据
    public static function mcrypt_cfb($algorithm,$key,$data,$mode,$iv=null){return mcrypt_cfb($algorithm,$key,$data,$mode,$iv);}//以 CFB 模式加解密数据
    public static function mcrypt_ecb($algorithm,$key,$data,$mode,$iv=null){return mcrypt_ecb($algorithm,$key,$data,$mode);}//以 ECB 模式加解密数据
    public static function mcrypt_ofb($algorithm,$key,$data,$mode,$iv=null){return mcrypt_ofb($algorithm,$key,$data,$mode,$iv);}//以 OFB 模式加解密数据

    public static function mcrypt_generic_end($td){return mcrypt_generic_end($td);}//终止加密

}