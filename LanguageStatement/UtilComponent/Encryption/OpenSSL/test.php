<?php
/**
 * OpenSSL Usage
 *
 * 1,生成私钥KEY
 *      openssl genrsa -des3 -out server.key 2048
 * 2,生成证书请求文件CSR (包含 标识信息,要注意的是Common Name这里，要填写成使用SSL证书)
 *      openssl req -new -key server.key -out server.csr
 * 3,生成CA的证书 (X.509证书的认证者总是CA或由CA指定的人，所以得先生成一个CA的证书)
 *      openssl req -new -x509 -key server.key -out ca.crt -days 3650
 * 4,用第3步的CA证书给自己颁发一个证书
 *      openssl x509 -req -days 3650 -in server.csr -CA ca.crt -CAkey server.key -CAcreateserial -out server.crt
 */

// cipher method (列出加密方法)
$cipherList=openssl_get_cipher_methods(true);//var_dump($cipherList);exit;
$ivLen=openssl_cipher_iv_length('AES-128-CBC');//var_dump($ivLen);
//
$config = array('private_key_bits' => 1024);
$keyResource = openssl_pkey_new();//var_dump($keyResource);exit;
$dn = array(
    "countryName" => "UK",
    "stateOrProvinceName" => "Somerset",
    "localityName" => "Glastonbury",
);
$csr = openssl_csr_new($dn, $keyResource);
$csrString='';
openssl_csr_export($csr,$csrString);//var_dump($csrString);
//openssl_csr_export_to_file($csr,'public.csr');//var_dump($csrString);
$sscert = openssl_csr_sign($csr, null, $keyResource, 365);
//openssl_csr_export($csr, $csrout) and var_dump($csrout);
//openssl_x509_export($sscert, $certout) and var_dump($certout);
//openssl_pkey_export($keyResource, $pkeyout, "mypassword") and var_dump($pkeyout);
$publicKey=openssl_pkey_get_public($sscert);
$privateKey=$keyResource;

$data = 'Let us meet at 9 o\'clock at the secret place.';
$sealed_data = '';
$plaint_data = '';
$keys1=[];
//$keys2='';
openssl_seal($data,$sealed_data,$keys1,[$publicKey],'rc4');var_dump($sealed_data,$keys1);
openssl_open($sealed_data,$plaint_data,$keys1[0],$privateKey,'rc4');var_dump($plaint_data);



