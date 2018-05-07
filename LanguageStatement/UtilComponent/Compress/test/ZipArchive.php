<?php
/**
 * ZipArchive 用例
 */

namespace LanguageStatement\UtilComponent\Compress\test;
//创建
$zip = new \ZipArchive();
$zip->open('test2.zip', \ZipArchive::CREATE);
//添加文件
$zip->addEmptyDir('dir1');
$zip->addFile('Zip.php');
$zip->addFromString('file1.txt','test1');
//$zip->addGlob('*.txt',GLOB_BRACE,array('add_path' => 'dir1/'));
//压缩方法
//$zip->setCompressionIndex(1, \ZipArchive::CM_STORE);
$zip->setCompressionIndex(2, \ZipArchive::CM_DEFLATE);

//获取信息
echo 'ArchiveComment:'.$zip->getArchiveComment()."\n";
echo 'CommentIndex:'.$zip->getCommentIndex(2)."\n";
echo 'CommentName:'.$zip->getCommentName('Zip.php')."\n";
//解压
$zip->extractTo('extrac');
//
$zip->renameName('file1.txt','back.file1.php');
//删除
//$zip->deleteIndex(2);
//$zip->deleteName('Zip.php');

$zip->close();

