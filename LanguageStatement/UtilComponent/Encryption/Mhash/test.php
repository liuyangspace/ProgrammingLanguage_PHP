<?php
/**
 * HMAC的应用
 * hmac主要应用在身份验证中，它的使用方法是这样的：
 * (1) 客户端发出登录请求（假设是浏览器的GET请求）
 * (2) 服务器返回一个随机值，并在会话中记录这个随机值
 * (3) 客户端将该随机值作为密钥，用户密码进行hmac运算，然后提交给服务器
 * (4) 服务器读取用户数据库中的用户密码和步骤2中发送的随机值做与客户端一样的hmac运算，然后与用户发送的结果比较，如果结果一致则验证用户合法
 */

$rand_key='123456';
$pass='a123456';

$hash=mhash(MHASH_SHA256,$rand_key);
$hmac=mhash(MHASH_SHA256,$rand_key,$pass);
var_dump($hash);
var_dump($hmac);


