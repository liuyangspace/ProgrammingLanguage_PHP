<?php
/**
 * 用例
 */
var_dump(DIRECTORY_SEPARATOR);
var_dump(PATH_SEPARATOR);
$dirPath=__DIR__.DIRECTORY_SEPARATOR.'..';
//创建Directory
$dir=dir($dirPath);
while($dirName=$dir->read()){
    echo "$dirName\n";
}
$dir->close();
//列出指定路径中的文件和目录
$handle=opendir($dirPath);
while($dirName=readdir($handle)){
    echo "$dirName\n";
}
closedir($handle);
//列出指定路径中的文件和目录
var_dump(scandir($dirPath));
//改变目录
echo getcwd()."\n";
chdir($dirPath);
echo getcwd()."\n";
