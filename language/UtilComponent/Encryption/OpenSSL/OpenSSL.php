<?php
/**
 * OpenSSL
 * 主要算法有：RSA、Elgamal、背包算法、Rabin、D-H、ECC（椭圆曲线加密算法）等。
 * 相关概念：
 *      ca证书：Certification Authority，CA服务商 判明申请者的身份
 *      PEM:Openssl使用PEM(RFC 1421－1424)文档格式
 *
 * 格式：
 *  key 是私用密钥openssl格。
 *  csr 是Certificate Signing Request的缩写，即证书签名请求
 *  crt 即 certificate的缩写，即证书。
 *  X.509 是一种证书格式.对X.509证书来说，认证者总是CA或由CA指定的人，一份X.509证书是一些标准字段的集合，这些字段包含有关用户或设备及其相应公钥的信息。
 *      PEM - Privacy Enhanced Mail,打开看文本格式,以"-----BEGIN..."开头, "-----END..."结尾,内容是BASE64编码.
 *      DER - Distinguished Encoding Rules,打开看是二进制格式.
 *
 *  PKCS 全称是 Public-Key Cryptography Standards ，是由 RSA 实验室与其它安全系统开发商为促进公钥密码的发展而制订的一系列标准，PKCS 目前共发布过 15 个标准。 常用的有：
 *  PKCS#7 Cryptographic Message Syntax Standard
 *  PKCS#10 Certification Request Standard
 *  PKCS#12 Personal Information Exchange Syntax Standard
 *  X.509是常见通用的证书格式。所有的证书都符合为Public Key Infrastructure (PKI) 制定的 ITU-T X509 国际标准。
 *  PKCS#7 常用的后缀是： .P7B .P7C .SPC
 *  PKCS#12 常用的后缀有： .P12 .PFX
 *  X.509 DER 编码(ASCII)的后缀是： .DER .CER .CRT
 *  X.509 PAM 编码(Base64)的后缀是： .PEM .CER .CRT
 *  .cer/.crt是用于存放证书，它是2进制形式存放的，不含私钥。
 *  .pem跟crt/cer的区别是它以Ascii来表示。
 *  pfx/p12用于存放个人证书/私钥，他通常包含保护密码，2进制方式
 *  p10是证书请求
 *  p7r是CA对证书请求的回复，只用于导入
 *  p7b以树状展示证书链(certificate chain)，同时也支持单个证书，不含私钥。
 *
 * 生成证书：
 * 1,生成私钥KEY
 *      openssl genrsa -des3 -out server.key 2048
 * 2,生成证书请求文件CSR (包含 标识信息,要注意的是Common Name这里，要填写成使用SSL证书)
 *      openssl req -new -key server.key -out server.csr
 * 3,生成CA的证书 (X.509证书的认证者总是CA或由CA指定的人，所以得先生成一个CA的证书)
 *      openssl req -new -x509 -key server.key -out ca.crt -days 3650
 * 4,用第3步的CA证书给自己颁发一个证书
 *      openssl x509 -req -days 3650 -in server.csr -CA ca.crt -CAkey server.key -CAcreateserial -out server.crt
 *
 * 数字信封:
 *      数字信封是将对称密钥通过非对称加密（即：有公钥和私钥两个）的结果分发对称密钥的方法。
 *      数字信封是实现信息完整性验证的技术。
 * PKCS#7:
 *      PKCS#7描述数字证书的语法和其他加密消息——尤其是，数据加密和数字签名的方法，也包含了算法。当使用PKCS#7
 *      进行数字签名时，结果包含签名证书（一列相关证书撤回列表）和已证明路径上任何其他证书。如果使用PKCS#7加密
 *      数据，通常包含发行者的参考消息和证书的序列号，它与用于解密已加密数据的公共密钥相关。
 * PKCS#12:
 *      PKCS#12是一种供应标准格式，主要为了传输、备份、恢复数字证书和它们相关的在公钥加密系统里的公钥或私钥。
 *      PKCS#12是输出格式，通常用于输出数字证书和它的私钥，因为用一个安全性差一点的方法输出一个用户的私钥带来
 *      安全上的危险。PKCS#12用于输出数字证书给其他的计算机，到可移动的媒体以备份，或者到智能卡激活智能卡能验
 *      证方案。
 *
 */

namespace LanguageStatement\UtilComponent\Encryption\OpenSSL;


class OpenSSL
{
    public static $config=[
        'openssl.cafile',//Location of Certificate Authority file on local filesystem which should be used with the verify_peer context option to authenticate the identity of the remote peer.
        'openssl.capath',//If cafile is not specified or if the certificate is not found there, the directory pointed to by capath is searched for a suitable certificate. capath must be a correctly hashed certificate directory.
    ];

    public static $constant=[
        // Purpose checking flags
        'X509_PURPOSE_SSL_CLIENT',//
        'X509_PURPOSE_SSL_SERVER',//
        'X509_PURPOSE_NS_SSL_SERVER',//
        'X509_PURPOSE_SMIME_SIGN',//
        'X509_PURPOSE_SMIME_ENCRYPT',//
        'X509_PURPOSE_CRL_SIGN',//
        'X509_PURPOSE_ANY',//
        // Padding flags for asymmetric encryption
        'OPENSSL_PKCS1_PADDING',//
        'OPENSSL_SSLV23_PADDING',//
        'OPENSSL_NO_PADDING',//
        'OPENSSL_PKCS1_OAEP_PADDING',//
        // PKCS7 Flags/Constants
        'PKCS7_TEXT',//
        'PKCS7_BINARY',//
        'PKCS7_NOINTERN',//
        'PKCS7_NOVERIFY',//
        'PKCS7_NOCHAIN',//
        'PKCS7_NOCERTS',//
        'PKCS7_NOATTR',//
        'PKCS7_DETACHED',//
        'PKCS7_NOSIGS',//
        // Signature Algorithms
        'OPENSSL_ALGO_DSS1',
        'OPENSSL_ALGO_SHA1',
        'OPENSSL_ALGO_SHA224',
        'OPENSSL_ALGO_SHA384',
        'OPENSSL_ALGO_SHA512',
        'OPENSSL_ALGO_RMD160',
        'OPENSSL_ALGO_MD5',
        'OPENSSL_ALGO_MD4',
        'OPENSSL_ALGO_MD2',
        // Ciphers
        'OPENSSL_CIPHER_RC2_40',//
        'OPENSSL_CIPHER_RC2_128',//
        'OPENSSL_CIPHER_RC2_64',//
        'OPENSSL_CIPHER_DES',//
        'OPENSSL_CIPHER_3DES',//
        'OPENSSL_CIPHER_AES_128_CBC',//
        'OPENSSL_CIPHER_AES_192_CBC',//
        'OPENSSL_CIPHER_AES_256_CBC',//
        // Version constants
        'OPENSSL_VERSION_TEXT',
        'OPENSSL_VERSION_NUMBER',
        // Server Name Indication constants
        'OPENSSL_TLSEXT_SERVER_NAME',
    ];

    /**
     * 证书，秘钥
     */
    // key (,privateKey)  (resource)
    /* resource */public static function openssl_pkey_new($config){return openssl_pkey_new($config);}//Generates a new private key
    /* resource */public static function openssl_pkey_get_private($keyPEM,$passphrase=""){return openssl_pkey_get_private($keyPEM,$passphrase);}//Get a private key
    /* resource */public static function openssl_get_privatekey($keyPEM,$passphrase=""){return openssl_get_privatekey($keyPEM,$passphrase);}//别名 openssl_pkey_get_private()

    public static function openssl_pkey_free($key){openssl_pkey_free($key);}//Frees a private key resource
    public static function openssl_free_key($key_identifier){openssl_free_key($key_identifier);}//Free key resource
    public static function openssl_pkey_export($key,&$out,$passphrase,$configargs){return openssl_pkey_export($key,$out,$passphrase,$configargs);}//Gets an exportable representation of a key into a string
    public static function openssl_pkey_export_to_file($key,&$outfilename,$passphrase,$configargs){return openssl_pkey_export_to_file($key,$outfilename,$passphrase,$configargs);}//Gets an exportable representation of a key into a file
    public static function openssl_pkey_get_details($key){return openssl_pkey_get_details($key);}//Returns an array with the key details

    // csr (Certificate Signing Request)
    /* resource */public static function openssl_csr_new($dn,&$keyResource,$configargs,$extraattribs){return openssl_csr_new($dn,$keyResource,$configargs,$extraattribs);}//Generates a CSR
    public static function openssl_csr_export($csr,&$outString,$notext=true){return openssl_csr_export($csr,$outString,$notext);}//Exports a CSR as a string
    public static function openssl_csr_export_to_file($csr,&$outFilename,$notext=true){return openssl_csr_export_to_file($csr,$outFilename,$notext);}//Exports a CSR to a file
    public static function openssl_csr_get_subject($csr,$use_shortnames=true){return openssl_csr_get_subject($csr,$use_shortnames);}//Returns the subject(array) of a CERT

    // crt (certificate)
    /* resource */public static function openssl_csr_sign($csr,$cacert,$priv_key,$days,$configargs,$serial=0){return openssl_csr_sign($csr,$cacert,$priv_key,$days,$configargs,$serial);}//Sign a CSR with another certificate (or itself) and generate a certificate
    /* resource */public static function openssl_x509_read($x509certdata){return openssl_x509_read($x509certdata);}//Parse an X.509 certificate and return a resource identifier for it
    public static function openssl_x509_parse($x509cert,$shortnames=true){return openssl_x509_parse($x509cert,$shortnames);}//Parse an X509 certificate and return the information as an array
    public static function openssl_x509_free($x509cert){openssl_x509_free($x509cert);}//Free certificate resource
    public static function openssl_x509_export($x509,&$output,$notext=TRUE){return openssl_x509_export($x509,$output,$notext);}//Exports a certificate as a string
    public static function openssl_x509_export_to_file($x509,&$output,$notext=TRUE){return openssl_x509_export_to_file($x509,$output,$notext);}//Exports a certificate to file
    public static function openssl_get_cert_locations(){return openssl_get_cert_locations();}//Retrieve the available certificate locations

    public static function openssl_x509_checkpurpose($x509cert,$purpose,$cainfo=[],$untrustedfile){return openssl_x509_checkpurpose($x509cert,$purpose,$cainfo,$untrustedfile);}//Verifies if a certificate can be used for a particular purpose
    public static function openssl_x509_fingerprint($x509,$hash_algorithm="sha1",$raw_output=FALSE){return openssl_x509_fingerprint($x509,$hash_algorithm,$raw_output);}//Calculates the fingerprint, or digest, of a given X.509 certificate
        // certificate <-> key
    public static function openssl_x509_check_private_key($cert,$key){return openssl_x509_check_private_key($cert,$key);}//Checks if a private key corresponds to a certificate

    // public key
        // crt -> publicKey
    /* resource */public static function openssl_csr_get_public_key($csr,$use_shortnames=true){return openssl_csr_get_public_key($csr,$use_shortnames);}//Returns the public key of a CERT
        // certificate -> publicKey
    /* resource */public static function openssl_pkey_get_public($certificate){return openssl_pkey_get_public($certificate);}//Extract public key from certificate and prepare it for use
    /* resource */public static function openssl_get_publickey($certificate){return openssl_get_publickey($certificate);}//别名 openssl_pkey_get_public()

    /**
     * 算法 随机向量 伪随机码
     */
    // openssl_get_cipher_methods
    public static function openssl_get_cipher_methods($aliases=false){return openssl_get_cipher_methods($aliases);}//Gets a list of available cipher methods.
    public static function openssl_get_md_methods($aliases=false){return openssl_get_md_methods($aliases);}//Gets available digest methods
    public static function openssl_cipher_iv_length($method){return openssl_cipher_iv_length($method);}//Gets the cipher initialization vector (iv) length.
    public static function openssl_random_pseudo_bytes($length,&$crypto_strong){return openssl_random_pseudo_bytes($length,$crypto_strong);}//Generate a pseudo-random string of bytes

    /**
     * 加解密，签名
     */
    // 对称 加解密
    public static function openssl_encrypt($data,$method,$password,$options=0,$iv=""){return openssl_encrypt($data,$method,$password,$options,$iv);}//Encrypts data
    public static function openssl_decrypt($data,$method,$password,$options=0,$iv=""){return openssl_decrypt($data,$method,$password,$options,$iv);}//Decrypts data
    // 非对称 加解密
    public static function openssl_private_encrypt($data,&$crypted,$key,$padding=OPENSSL_PKCS1_PADDING){return openssl_private_encrypt($data,$crypted,$key,$padding);}//私钥加密
    public static function openssl_public_decrypt($data,&$decrypted,$key,$padding=OPENSSL_PKCS1_PADDING){return openssl_public_decrypt($data,$decrypted,$key,$padding);}//公钥解密
    public static function openssl_public_encrypt($data,&$crypted,$key,$padding=OPENSSL_PKCS1_PADDING){return openssl_public_encrypt($data,$crypted,$key,$padding);}//公钥加密
    public static function openssl_private_decrypt($data,&$decrypted,$key,$padding=OPENSSL_PKCS1_PADDING){return openssl_private_decrypt($data,$decrypted,$key,$padding);}//私钥解密
    // 签名 验签
    public static function openssl_sign($data,&$signature,$priv_key_id,$signature_alg=OPENSSL_ALGO_SHA1){return openssl_sign($data,$signature,$priv_key_id,$signature_alg);}//Generate signature
    public static function openssl_verify($data,$signature,$pub_key_id,$signature_alg=OPENSSL_ALGO_SHA1){return openssl_verify($data,$signature,$pub_key_id,$signature_alg);}//Verify signature
    // 数字信封(包含 envelope key) 混合加密 （公钥加密 私钥解密，分发对称密钥）
    public static function openssl_seal($data,&$sealed_data,&$env_keys,$pub_key_ids,$method="RC4"){return openssl_seal($data,$sealed_data,$env_keys,$pub_key_ids,$method);}//Seal (encrypt) data
    public static function openssl_open($sealed_data,&$open_data,$env_key,$priv_key_id,$method){return openssl_open($sealed_data,$open_data,$env_key,$priv_key_id,$method);}//opens (decrypts) sealed_data
    // 另一种 签名 验签 ( PEM formatted public key  )
    public static function openssl_spki_new(&$privkey,&$challenge,$algorithm=0){return openssl_spki_new($privkey,$challenge,$algorithm);}//Generates a signed public key and challenge using specified hashing algorithm
    public static function openssl_spki_verify(&$spkac){return openssl_spki_verify($spkac);}//Validates the supplied signed public key and challenge
    public static function openssl_spki_export(&$spkac){return openssl_spki_export($spkac);}//Exports PEM formatted public key from encoded signed public key and challenge
    public static function openssl_spki_export_challenge(&$spkac){return openssl_spki_export_challenge($spkac);}//Exports challenge from encoded signed public key and challenge
    // error
    public static function openssl_error_string(){return openssl_error_string();}//Return openSSL error message
    // PKCS 12 Certificate
    public static function openssl_pbkdf2($password,$salt,$key_length,$iterations,$digest_algorithm){return openssl_pbkdf2($password,$salt,$key_length,$iterations,$digest_algorithm);}//Generates a PKCS5 v2 PBKDF2 string, defaults to SHA-1
    public static function openssl_pkcs12_read($pkcs12,&$certs,$pass){return openssl_pkcs12_read($pkcs12,$certs,$pass);}//Parse a PKCS#12 Certificate Store into an array
    public static function openssl_pkcs12_export($x509,&$out,$priv_key,$pass,$args){return openssl_pkcs12_export($x509,$out,$priv_key,$pass,$args);}//Exports a PKCS#12 Compatible Certificate Store File to variable.
    public static function openssl_pkcs12_export_to_file($x509,&$filename,$priv_key,$pass,$args){return openssl_pkcs12_export_to_file($x509,$filename,$priv_key,$pass,$args);}//Exports a PKCS#12 Compatible Certificate Store File
    // PKCS 7 Certificate S/MIME message (混合加密)
    public static function openssl_pkcs7_encrypt($infile,$outfile,$cert,$headers,$flags=0,$cipherid=OPENSSL_CIPHER_RC2_40){return openssl_pkcs7_encrypt($infile,$outfile,$cert,$headers,$flags,$cipherid);}//Encrypt an S/MIME message
    public static function openssl_pkcs7_decrypt($inFilename,$outFilename,$cert,$privateKey){return openssl_pkcs7_decrypt($inFilename,$outFilename,$cert,$privateKey);}//Decrypts an S/MIME encrypted message
    public static function openssl_pkcs7_sign($inFilename,$outFilename,$cert,$privateKey,$headers,$flags=PKCS7_DETACHED,$cert){return openssl_pkcs7_sign($inFilename,$outFilename,$cert,$privateKey,$headers,$flags,$cert);}//Sign an S/MIME message
    public static function openssl_pkcs7_verify($filename,$flags,$outFilename,$cainfo,$cert,$content){return openssl_pkcs7_verify($filename,$flags,$outFilename,$cainfo,$cert,$content);}//Verifies the signature of an S/MIME signed message
    // 摘要
    public static function openssl_digest($data,$method,$raw_output=false){return openssl_digest($data,$method,$raw_output);}//Computes a digest
    // ?
    public static function openssl_dh_compute_key($pub_key,$dh_key){return openssl_dh_compute_key($pub_key,$dh_key);}//Computes shared secret for public value of remote DH key and local DH key

}