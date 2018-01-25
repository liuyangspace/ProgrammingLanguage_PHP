<?php
/**
 * openssl 对称加密
 */
$key = 'this is a secret key';//秘钥
$plain_text  = "Let us meet at 9 o'clock at the secret place.";//明文
//openssl_encrypt
var_dump( "[明文]".$plain_text );//密文
$iv = '0000000000000000';
//$iv = openssl_random_pseudo_bytes(16);
var_dump(openssl_get_cipher_methods());
$encrypt_text = openssl_encrypt($plain_text,'AES-128-ECB',$key,OPENSSL_RAW_DATA | OPENSSL_PKCS1_PADDING ,$iv);
var_dump( '[密文]'.base64_encode($encrypt_text) );//密文
//$iv = openssl_random_pseudo_bytes(16);
$decrypt_text = openssl_decrypt($encrypt_text,'AES-128-ECB',$key,OPENSSL_RAW_DATA | OPENSSL_PKCS1_PADDING ,$iv);
var_dump( '[解密]'.$decrypt_text );//解密
