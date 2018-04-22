<?php
// 简单的在线编辑服务器文件的脚本
// 用户列表
$GLOBALS['userList'] = [
    'admin'=>'*ly123_tv'
];
//
define('WEB_ROOT','/hwdata/www/epg_laravel/public');

// auth
function auth(){
    session_start();
    if(!isset($_SESSION['user']) || !$_SESSION['user']){
        sleep(3 );
        $authNotice = '';
        if( !isset($_SERVER['PHP_AUTH_USER']) || !isset($_SERVER['PHP_AUTH_PW']) ){
            $authNotice = '需要用户名和密码才能继续访问！'; //取消时浏览器输出
        }elseif (isset($GLOBALS['userList'][$_SERVER['PHP_AUTH_USER']]) && $_SERVER['PHP_AUTH_PW']===$GLOBALS['userList'][$_SERVER['PHP_AUTH_USER']]){
            $_SESSION['user']=true;
            return;
        }else{
            $authNotice = '用户名和密码或密码错误！'; //取消时浏览器输出
        }
        http_response_code(401);
        header('WWW-Authenticate:Basic realm="'.$authNotice.'"');
        echo $authNotice; //取消时浏览器输出
        exit;
    }elseif(isset($_GET['loginOut'])){
        $_SESSION['user']=false;
        exit;
    }
}
auth();
// path
function recentFilename($recentPath){
    $recentPath=explode(DIRECTORY_SEPARATOR,$recentPath);
    return array_pop($recentPath);
}
function recentDir($recentPath){
    $recentPath=explode(DIRECTORY_SEPARATOR,$recentPath);
    array_pop($recentPath);
    $parentDie=implode(DIRECTORY_SEPARATOR,$recentPath);
    return $parentDie?$parentDie:'/';
}
// file
$recentPath=__DIR__;
$webPath=substr(__FILE__,strlen(WEB_ROOT));
if(isset($_GET['recentPath'])){
    $recentPath=$_GET['recentPath'];
}
$recentDir=recentDir($recentPath);
$recentFilename=recentFilename($recentPath);
if(!file_exists($recentPath)){
    echo '文件或目录不存在';
}

if(is_file($recentPath)){
    if($recentPath==__FILE__){
        exit('禁止访问');
    }
    if(isset($_POST['content'])){
        file_put_contents($recentPath,$_POST['content']);
    }
    //
    $fileType='';
    if(extension_loaded('fileinfo')){
        $fileinfo=new \finfo(FILEINFO_MIME_TYPE);
        $mimeType=$fileinfo->file($recentPath);
        $fileType=array_shift(explode('/',$mimeType));
    }
    if($fileType=='image'){
        if(isset($_GET['getImageFile'])){
            header( "Content-type:  $mimeType ");
            readfile($recentPath);exit();
        }else{
            echo <<<HTML
<form action="$webPath?recentPath=$recentPath" method="post">
    <img src="$webPath?recentPath=$recentPath&getImageFile=true"/><br>
    <input type="submit" name="提交修改" />
    <a href="$webPath?recentPath=$recentDir">返回</a>
</form>
HTML;
            exit();
        }
    }elseif($fileType=='text'){
        $content = file_get_contents($recentPath);
        $content = htmlspecialchars($content);
        $webLink=str_replace(WEB_ROOT,'',$recentPath);
        echo <<<HTML
<form action="$webPath?recentPath=$recentPath" method="post">
    <textarea  name="content" cols="150" rows="35">$content</textarea><br>
    <input type="submit" name="提交修改" />
    <a href="$webPath?recentPath=$recentDir">返回</a>
    <a href="$webLink" target="_blank">预览</a>
</form>
HTML;
    }else{
        $content = file_get_contents($recentPath);
        $content = htmlspecialchars($content);
        $webLink=str_replace(WEB_ROOT,'',$recentPath);
        echo <<<HTML
<form action="$webPath?recentPath=$recentPath" method="post">
    <textarea  name="content" cols="150" rows="35">$content</textarea><br>
    <input type="submit" name="提交修改" />
    <a href="$webPath?recentPath=$recentDir">返回</a>
    <a href="$webLink" target="_blank">预览</a>
</form>
HTML;
    }
}elseif(is_dir($recentPath)){
    // add
    if(isset($_GET['addFileName'])){
        touch($recentPath.DIRECTORY_SEPARATOR.$_GET['addFileName']);
        chmod($recentPath.DIRECTORY_SEPARATOR.$_GET['addFileName'],0775);
    }
    if(isset($_GET['addDirName'])){
        mkdir($recentPath.DIRECTORY_SEPARATOR.$_GET['addDirName'],0775);
    }
    // delete
    if(isset($_GET['deleteFileName'])){
        $deleteFile = $recentPath.DIRECTORY_SEPARATOR.$_GET['deleteFileName'];
        if(is_dir($deleteFile)){
            rmdir($recentPath.DIRECTORY_SEPARATOR.$_GET['deleteFileName']);
        }elseif(is_file($deleteFile)){
            unlink($recentPath.DIRECTORY_SEPARATOR.$_GET['deleteFileName']);
        }
    }
    // rename
    if(isset($_GET['changeFileName']) && isset($_GET['oldFileName'])){
        $oldFile = $recentPath.DIRECTORY_SEPARATOR.$_GET['oldFileName'];
        $newFile = $recentPath.DIRECTORY_SEPARATOR.$_GET['changeFileName'];
        rename($oldFile,$newFile);
    }
    // downloade
    if(isset($_GET['downloadFileName'])){
        $downloadFileName = $recentPath.DIRECTORY_SEPARATOR.$_GET['downloadFileName'];
        ob_start();
        header( "Content-type:  application/octet-stream ");
        header( "Accept-Ranges:  bytes ");
        header( "Content-Disposition:  attachment;  filename= ".$_GET['downloadFileName']);
        header( "Accept-Length: " .filesize($downloadFileName));
        readfile($downloadFileName);
        exit();
    }
    // upload
    if(isset($_FILES['uploadFile']) && is_uploaded_file($_FILES['uploadFile']['tmp_name'])){
        move_uploaded_file($_FILES['uploadFile']['tmp_name'],$recentPath.DIRECTORY_SEPARATOR.$_FILES['uploadFile']['name']);
    }
    // changePerms
    if(isset($_GET['changePerms']) && isset($_GET['oldFileName'])){
        $oldFile = $recentPath.DIRECTORY_SEPARATOR.$_GET['oldFileName'];
        chmod($oldFile,intval($_GET['changePerms'],8));
    }
    // changeOwner
    if(isset($_GET['changeOwner']) && isset($_GET['oldFileName'])){
        $oldFile = $recentPath.DIRECTORY_SEPARATOR.$_GET['oldFileName'];
        chown($oldFile,$_GET['changeOwner']);
    }
    // list
    $dir=dir($recentPath);
    $dirInfo=[];
    $dirInfo['.']=$webPath.'?recentPath='.$recentPath;
    $dirInfo['..']=$webPath.'?recentPath='.realpath($recentPath.DIRECTORY_SEPARATOR.'..');
    $child=false;
    $dirTypeInfo=[
        'dir'=>[],
        'file'=>[],
        'other'=>[],
    ];
    $intToString='string_';
    while($child=$dir->read()){
        $childPath=realpath($recentPath.DIRECTORY_SEPARATOR.$child);
        if(is_file($childPath)){
            $dirTypeInfo['file'][$intToString.$child]=$childPath;
        }elseif($childPath){
            $dirTypeInfo['dir'][$intToString.$child]=$childPath;
        }else{
            $dirTypeInfo['other'][$intToString.$child]=$childPath;
        }
    }
    $dir->close();
    foreach($dirTypeInfo as $key=>$value){
        ksort($value);
        foreach($value as $k=>$v){
            $dirInfo[substr($k,strlen($intToString))]=$v;
        }
    }
    // show list
    echo <<<HTML
    <table border="0">
    <thead>
        <tr>
            <th></th>
            <th>FileName</th>
            <th>FileSize</th>
            <th>Perms/User/Group</th>
            <th>Look</th>
        </tr>
   </thead>
   <tbody>
HTML;
    foreach($dirInfo as $key=>$child){
        if(is_dir($child)){
            $isDir='/';
        }else{
            $isDir='';
        }
        $sizeFormat = function($fileSize){
            $sizeStr='';
            $base=1024;
            $unit=['B','K','M','G','P'];
            //
            $recentSize=intval($fileSize);
            if($recentSize==0) return '0'.array_shift($unit);
            foreach($unit as $v){
                $multiple=floor($recentSize/$base);
                $over=$recentSize%$base;
                if($over>0){
                    $sizeStr=$over.$v.$sizeStr;
                }
                if($multiple>0){
                    $recentSize=$multiple;
                }else{
                    break;
                }
            }
            return $sizeStr;
        };
        $fileSize=$sizeFormat(fileSize($child));
        $filePerms=substr(sprintf('%o', fileperms($child)), -4);
        if(extension_loaded('posix')) {
            $fileOwner=posix_getpwuid(fileowner($child))['name'];
            $fileGroup=posix_getgrgid(filegroup($child))['name'];
        }else{
            $fileOwner='没有扩展:posix';
            $fileGroup='没有扩展:posix';
        }
        $webLink=str_replace(WEB_ROOT,'',$child);
        //url urlencode
        //$recentPath=urlencode($recentPath);
        $fileName=$key;
        $key=urlencode($key);
        $child=urlencode($child);

        echo <<<HTML
<tr>
    <td>
        <a href="$webPath?recentPath=$recentPath&deleteFileName=$key" title="删除"> -</a>
        <a href="javascript:void(0);" onclick="changeFileName('$key')" title="重命名"> ↔</a>
        <a href="$webPath?recentPath=$recentPath&downloadFileName=$key" target="_blank" title="下载"> ↓</a>
    </td>
    <td>
        <a href="$webPath?recentPath=$child">$fileName$isDir</a></br>
    </td>
    <td>
        $fileSize
    </td>
    <td>
        <a href="javascript:void(0);"
            onclick="changeFile('$key','请输入新的权限值','$filePerms','请输入有效的权限值！','changePerms')"
            title="修改权限" >$filePerms</a>/
        <a href="javascript:void(0);"
            onclick="changeFile('$key','请输入新的用户','$fileOwner','请输入有效的用户！','changeOwner')"
            title="修改用户" >$fileOwner</a>/
        $fileGroup
    </td>
    <td>
        <a href="$webLink" target="_blank">Look</a>
    </td>
<tr>
HTML;
    }
    echo <<<HTML
    </tbody>
    </table>
HTML;
    // add
    echo <<<HTML
    <br>
<a href="javascript:void(0);" onclick="disp_prompt('addFileName')" title="添加文件"> + </a>
<a href="javascript:void(0);" onclick="disp_prompt('addDirName')" title="添加目录"> +/ </a>
<!--<a href="javascript:void(0);" onclick="uploadFile()" title="上传文件"> ↑ </a>-->
<form action="$webPath?recentPath=$recentPath" method="post" enctype="multipart/form-data" >
<br>
    <input type="file" name="uploadFile" />
    <input type="submit" name="上传" />
</form>
</br>
<script type="text/javascript">
    function disp_prompt(key)
    {
        var filename=prompt("请输入文件名","");
        if(filename==null){
            return null;
        }
        if (filename=="") {
            alert('请输入有效的文件名！');
            disp_prompt();
        }else{
            window.location="$webPath?recentPath=$recentPath&"+key+"="+filename;
        }
    }
    function changeFileName(oldName)
    {
        var filename=prompt("请输入新的文件名",oldName);
        if(filename==null){
            return null;
        }
        if (filename=="") {
            alert('请输入有效的文件名！');
            disp_prompt();
        }else{
            window.location="$webPath?recentPath=$recentPath&changeFileName="+filename+"&oldFileName="+oldName;
        }
    }
    function changeFile(oldName,altStr,defaultValue,errorStr,operation){
        var changeValue=prompt(altStr,defaultValue);
        if(changeValue==null){
            return null;
        }
        if (changeValue=="") {
            alert(errorStr);
            disp_prompt();
        }else{
            window.location="$webPath?recentPath=$recentPath&"+operation+"="+changeValue+"&oldFileName="+oldName;
        }
    }
</script>
HTML;
}

// command
$returnList=[];
@exec("cd $recentPath");
if(isset($_POST['commandStr'])){
    exec($_POST['commandStr'],$returnList);
}
$returnStr='';
foreach($returnList as $v){
    $returnStr.=$v."\n";
}
echo <<<HTML
<form action="$webPath?recentPath=$recentPath" method="post">
    <textarea  name="commandStr" cols="150" rows="5">{$_POST['commandStr']}</textarea><br>
    <textarea  name="returnStr" cols="150" rows="5">$returnStr</textarea><br>
    <input type="submit" name="执行" />
</form>
HTML;
//
echo <<<HTML
<style>
    a {
        text-decoration:none;
    }
    tr:hover{
        background-color: #E5E5E5;
    }
    td {
        text-align: left;
        padding-right: 10px;
    }
</style>
HTML;

