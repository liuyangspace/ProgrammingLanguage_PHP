<?php
/**
 * 上传的文件 接口
 */

namespace LanguageStatement\LanguageExtension\File\FileUpload;


interface UploadFileInterface
{
    public function getName();
    public function getType();
    public function getSize();
    //上传文件的暂存目录/文件名
    public function getPath();
    //返回 php $_FILES error code
    public function getError();
}