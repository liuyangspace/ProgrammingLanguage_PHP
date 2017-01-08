<?php
/**
 * 上传的文件 实体类
 */

namespace LanguageStatement\LanguageExtension\Streams\File\FileUpload;


class File implements UploadFileInterface
{
    protected $name;

    public function __construct($name){$this->name=$name;}
    public function getName(){return $_FILES[$this->name]['name'];}
    public function getType(){return $_FILES[$this->name]['type'];}
    public function getSize(){return $_FILES[$this->name]['Size'];}
    public function getPath(){return $_FILES[$this->name]['tmp_name'];}
    public function getError(){return $_FILES[$this->name]['error'];}
}