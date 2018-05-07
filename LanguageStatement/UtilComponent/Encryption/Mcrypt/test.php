<?php
/**
 * Mcrypt 用例
 */

//
$key = hash('sha256', 'this is a secret key', true);//秘钥
$plain_text  = "Let us meet at 9 o'clock at the secret place.";//明文

/* 算法 随机向量 初始化 */
$td = mcrypt_module_open('rijndael-128', '', 'cbc', '');
$size=mcrypt_enc_get_iv_size($td);//var_dump($size);
$iv = mcrypt_create_iv($size, MCRYPT_DEV_URANDOM);

/* 加密数据 */
if(strlen($plain_text)/$size !== 0){
    $plain_text.="\0";
}
mcrypt_generic_init($td, $key, $iv);
$c_t = mcrypt_generic($td, $plain_text);
mcrypt_generic_deinit($td);
var_dump( $c_t );//密文

/* 解密 为解密重新初始化缓冲区 */
mcrypt_generic_init($td, $key, $iv);
$p_t = mdecrypt_generic($td, $c_t);
mcrypt_generic_deinit($td);
$p_t = rtrim($p_t, "\0");
var_dump( $p_t );//原文

/* 执行清理工作 */
mcrypt_module_close($td);


