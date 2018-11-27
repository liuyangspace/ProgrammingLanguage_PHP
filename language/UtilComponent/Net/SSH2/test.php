<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/2/9
 * Time: 10:31
 */

namespace LanguageStatement\UtilComponent\SSH2;


function my_ssh_disconnect($reason, $message, $language) {
    printf("Server disconnected with reason code [%d] and message: %s\n",
        $reason, $message);
}

$methods = array(
    'kex' => 'diffie-hellman-group1-sha1',
    'client_to_server' => array(
        'crypt' => '3des-cbc',
        'comp' => 'none'),
    'server_to_client' => array(
        'crypt' => 'aes256-cbc,aes192-cbc,aes128-cbc',
        'comp' => 'none'));

$callbacks = array('disconnect' => 'my_ssh_disconnect');

$connection = ssh2_connect('192.168.200.69', 22, $methods, $callbacks);

if (!$connection) die('Connection failed');
