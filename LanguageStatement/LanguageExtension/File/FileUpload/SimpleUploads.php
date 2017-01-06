<?php
/**
 * 多文件上传
 */

namespace LanguageStatement\LanguageExtension\File\FileUpload;


class SimpleUploads
{

    public function uploads($files,$toDir,callable $filename=null,$cover=false,$size=null,Array $typeArr=null)
    {
        $fileList=[];
        $result=[];
        if($files instanceof UploadFileInterface){
            $fileList[]=$files;
        }else{
            if(is_array($files)){

            }else{
                throw new \Exception('unavailable type(need UploadFileInterface or UploadFileInterface Array)!');
            }
        }
    }

    public function generateUniqueFileName($filename,$extension=null)
    {
        if(strpos($filename,'.')!==false){
            $tmpArr=explode(".",$filename);
            $originalExtension=array_pop($tmpArr);
            $originalName=str_replace('.'.$originalExtension,'',$filename);
        }else{
            $originalName=$filename;
            $originalExtension='';
        }

        $targetExtension=$originalExtension;
        if($extension!==null){
            $targetExtension=$extension;
        }
        $targetName=$originalName.'_'.uniqid().mt_rand(1000,9999);
        if($targetExtension){
            $targetName=$targetName.'.'.$targetExtension;
        }

        return $targetName;
    }
}