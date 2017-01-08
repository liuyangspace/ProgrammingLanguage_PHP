<?php
/**
 * PHP 文件上传
 */

namespace LanguageStatement\LanguageExtension\Streams\File\FileUpload;

class PHPFileUpload
{
    //
    protected $config=[
        'file_uploads',//Whether or not to allow HTTP file uploads.
        'upload_tmp_dir',//The temporary directory used for storing files when doing file upload.
        'upload_max_filesize',//The maximum size of an uploaded file.
        'max_file_uploads',//The maximum number of files allowed to be uploaded simultaneously.
    ];

    protected $files=[
        'name'      => '客户端机器文件的原名称。',
        'type'      => '文件的 MIME 类型，如果浏览器提供此信息的话。',//此 MIME 类型在 PHP 端并不检查，因此不要想当然认为有这个值。
        'size'      => '已上传文件的大小，单位为字节。 ',
        'tmp_name'  => '文件被上传后在服务端储存的临时文件名。',
        'error'     => '和该文件上传相关的错误代码。此项目是在 PHP 4.2.0 版本中增加的。',//
    ];

    protected static $error=[
        0   => UPLOAD_ERR_OK.':文件上传成功。',
        1   => UPLOAD_ERR_INI_SIZE.':上传的文件过大。',//超过了 php.ini 中 upload_max_filesize 选项限制的值。
        2   => UPLOAD_ERR_FORM_SIZE.':上传的文件过大。',//超过了 HTML 表单中 MAX_FILE_SIZE 选项指定的值。
        3   => UPLOAD_ERR_PARTIAL.':文件只有部分被上传。',
        4   => UPLOAD_ERR_NO_FILE.':没有文件被上传。',
        6   => UPLOAD_ERR_NO_TMP_DIR.':找不到临时文件夹。',
        7   => UPLOAD_ERR_CANT_WRITE.':文件写入失败。',
    ];

    public static function is_uploaded_file($filename){return is_uploaded_file($filename);}//判断文件是否是通过 HTTP POST 上传的
    public static function move_uploaded_file($filename,$destination){return move_uploaded_file($filename,$destination);}//将上传的文件移动到新位置
}