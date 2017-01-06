<?php
/**
 * 文件上传
 */

namespace LanguageStatement\LanguageExtension\File\FileUpload;


class FileUpload
{
    //错误码
    protected static $errorCode;
    //错误信息
    protected static $errorMessage;
    //类型限制
    protected static $limitType=[];
    //大小限制
    protected static $limitSize;

    //
    const UNKNOWN_ERROR     = -1;
    const USER_TYPE_LIMIT   = -2;
    const USER_SIZE_LIMIT   = -3;
    const METHOD_ERROR      = -4;
    const PATH_DIR_ERROR    = -5;
    const PATH_FILE_ERROR   = -6;

    protected static $error=[
        //
        UPLOAD_ERR_OK               => '文件上传成功。',
        UPLOAD_ERR_INI_SIZE         => '上传的文件过大。',//超过了 php.ini 中 upload_max_filesize 选项限制的值。
        UPLOAD_ERR_FORM_SIZE        => '上传的文件过大。',//超过了 HTML 表单中 MAX_FILE_SIZE 选项指定的值。
        UPLOAD_ERR_PARTIAL          => '文件只有部分被上传。',
        UPLOAD_ERR_NO_FILE          => '没有文件被上传。',
        UPLOAD_ERR_NO_TMP_DIR       => '找不到临时文件夹。',
        UPLOAD_ERR_CANT_WRITE       => '文件写入失败。',
        //
        self::UNKNOWN_ERROR         => '未知错误。',
        self::USER_TYPE_LIMIT       => '文件格式错误。',
        self::USER_SIZE_LIMIT       => '文件过大。',
        self::METHOD_ERROR          => '非法的文件上传方式。',//必须通过 PHP 的 HTTP POST 上传机制所上传
        self::PATH_DIR_ERROR        => '目标目录不存在。',
        self::PATH_FILE_ERROR       => '目标文件已存在。',
    ];

    /*
     * 文件上传
     * bool upload( UploadFileInterface $file,string $toPath,bool $cover,int $size,Array $typeArr )
     * @param UploadFileInterface $file 文件
     * @param string $toPath 目标位置，含目录(尝试创建目录)、文件名
     * @param bool $cover 目标文件存在是否覆盖
     * @param int $size 文件大小限制，仅本次有效
     * @param Array $typeArr 文件类型限制，仅本次有效
     * @return bool 文件上传成功返回true
     */
    public static function upload(UploadFileInterface $file,$toPath,$cover=false,$size=null,Array $typeArr=null)
    {
        //error
        if(UPLOAD_ERR_OK!=$file->getError()){
            self::checkError($file);
            return false;
        }
        //type
        $limitType=self::$limitType;
        if(!empty($typeArr)){
            $limitType=$typeArr;
        }
        if(!empty($limitType) && !in_array($file->getError(),$limitType,true)){
            self::setError(self::USER_TYPE_LIMIT);
            return false;
        }
        //size
        $limitSize=self::$limitSize;
        if(!empty($size)){
            $limitSize=$size;
        }
        if(!empty($limitSize) && !$file->getSize()>$limitSize){
            self::setError(self::USER_SIZE_LIMIT);
            return false;
        }
        //to path
        if(!file_exists(dirname($toPath)) && !mkdir(dirname($toPath),0777,true)){
            self::setError(self::PATH_DIR_ERROR);
            return false;
        }
        if(file_exists($toPath) && !$cover){
            self::setError(self::PATH_FILE_ERROR);
            return false;
        }
        //method POST
        if(!is_uploaded_file($file->getPath())){
            self::setError(self::METHOD_ERROR);
            return false;
        }
        //
        if(move_uploaded_file($file->getPath(),$toPath)){
            self::setError(UPLOAD_ERR_OK);
            return true;
        }else{
            self::setError(self::UNKNOWN_ERROR);
            return false;
        }
    }

    /*
     * 设置用户限制的类型
     * void setLimitType( Array $typeArr )
     * @param Array $typeArr 允许的类型组成的数组
     */
    public static function setLimitType(Array $typeArr)
    {
        self::$limitType=$typeArr;
    }

    /*
     * 设置用户限制文件大小
     * void setLimitSize( int $size )
     * @param int $size 文件大小限制，单位字节
     */
    public static function setLimitSize($size)
    {
        self::$limitSize=(int)$size;
    }

    //检测错误
    protected static function checkError(UploadFileInterface $file)
    {
        self::$errorCode=$file->getError();
        if(array_key_exists($file->getError(),self::$error)){
            self::$errorMessage=self::$error[$file->getError()];
        }else{
            self::setError(self::UNKNOWN_ERROR);
        }
    }

    //设置错误信息
    protected static function setError($errorKey)
    {
        self::$errorCode=$errorKey;
        self::$errorMessage=self::$error[$errorKey];
    }

    /*
     * 获取文件上传的最近一次错误码
     * int getLastErrorCode( void )
     * @return 错误码
     */
    public static function getLastErrorCode()
    {
        return self::$errorCode;
    }

    /*
     * 获取文件上传的最近一次错误信息
     * string getLastErrorMessage( void )
     * @return 错误信息
     */
    public static function getLastErrorMessage()
    {
        return self::$errorMessage;
    }
}

