<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/2/8
 * Time: 10:56
 */

namespace LanguageStatement\UtilComponent\FTP;

$ftp_server = "192.168.200.69";

// 建立基础连接
$conn_id = ftp_connect($ftp_server,21,10) or die("Couldn't connect to $ftp_server");

$login_result = ftp_login($conn_id, 'root', '123456') or die("login failure!");
ftp_chdir($conn_id,'/tmp/') or die("ftp_chdir failure!");
//ftp_alloc($conn_id,1024) or die("ftp_alloc failure!");
//$command='ls';
//echo ftp_exec($conn_id, $command);
//ftp_delete($conn_id,'/test/1') or die("ftp_delete failure!");
echo ftp_pwd($conn_id) ;//or die("ftp_pwd failure!");
$file = 'Ftp.php';
$fp = fopen($file, 'r');
ftp_fput($conn_id,'12.txt',$fp,FTP_BINARY);
