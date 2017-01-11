<?php
/**
 * PHP SESSION
 * 会话通常被用来在多个页面请求之间保存及共享信息。
 * 会话模块支持两种方式用来传送会话 ID：Cookies，URL 参数
 * 工作流程:
 *     1,当开始一个会话时，PHP 会尝试从请求中查找会话 ID （通常通过会话 cookie），
 *      如果请求中不包含会话 ID 信息，PHP 就会创建一个新的会话。
 *     2,会话开始之后，PHP 就会将会话中的数据设置到 $_SESSION 变量中。当 PHP 停止
 *      的时候，它会自动读取 $_SESSION 中的内容，并将其进行序列化，
 *     3,然后发送给会话保存管理器器来进行保存。默认情况下，PHP 使用内置的文件会话保存管理器（files,含锁）
 *      来完成会话的保存。 也可以通过配置项 session.save_handler来修改所要采用的会话保存管理器。
 * 不要使用unset($_SESSION)来释放整个$_SESSION， 因为它将会禁用通过全局$_SESSION去注册会话变量
 * 自定义会话管理器：SessionHandlerInterface，SessionHandler，session_set_save_handler()
 * Session上传进度：一个上传在处理中，同时POST一个与INI中设置的session.upload_progress.name同名变量时，上传进度可以在$_SESSION中获得
 * Session安全：参见配置和Manual
 */

namespace LanguageStatement\LanguageExtension\Streams\Network;


class Session
{

    protected static $config=[
        'session.save_handler',//定义了来存储和获取与会话关联的数据的处理器的名字。默认为 files
        'session.save_path',//定义了传递给存储处理器的参数
        'session.name',//指定会话名以用做 cookie 的名字。只能由字母数字组成，默认为 PHPSESSID
        'session.auto_start',//指定会话模块是否在请求开始时自动启动一个会话
        'session.serialize_handler',//定义用来序列化／解序列化的处理器名字
        'session.gc_probability',//与 session.gc_divisor 合起来用来管理 gc（garbage collection 垃圾回收）进程启动的概率
        'session.gc_divisor',//
        'session.gc_maxlifetime',//指定过了多少秒之后数据就会被视为"垃圾"并被清除
        'session.referer_check',//包含有用来检查每个 HTTP Referer 的子串
        'session.entropy_file',//给出了一个到外部资源（文件）的路径，该资源将在会话 ID 创建进程中被用作附加的熵值资源
        'session.entropy_length',//指定了从上面的文件中读取的字节数。
        'session.use_strict_mode',//whether the module will use strict session id mode
        'session.use_cookies',//指定是否在客户端用 cookie 来存放会话 ID
        'session.use_only_cookies',//指定是否在客户端仅仅使用 cookie 来存放会话 ID
        'session.cookie_lifetime',//以秒数指定了发送到浏览器的 cookie 的生命周期
        'session.cookie_path',//指定了要设定会话 cookie 的路径
        'session.cookie_domain',//指定了要设定会话 cookie 的域名
        'session.cookie_secure',//指定是否仅通过安全连接发送 cookie
        'session.cookie_httponly',//Marks the cookie as accessible only through the HTTP protocol
        'session.cache_limiter',//指定会话页面所使用的缓冲控制方法（none/nocache/private/private_no_expire/public）
        'session.cache_expire',//以分钟数指定缓冲的会话页面的存活期
        'session.use_trans_sid',//指定是否启用透明 SID 支持
        'session.hash_function',//允许用户指定生成会话 ID 的散列算法
        'session.hash_bits_per_character',//允许用户定义将二进制散列数据转换为可读的格式时每个字符存放多少个比特
        'url_rewriter.tags',//指定在使用透明 SID 支持时哪些 HTML 标记会被修改以加入会话 ID
        // 文件上传
        'session.upload_progress.enabled',//Enables upload progress tracking, populating the $_SESSION variable
        'session.upload_progress.cleanup',//Cleanup the progress information as soon as all POST data has been read
        'session.upload_progress.prefix',//A prefix used for the upload progress key in the $_SESSION
        'session.upload_progress.name',//The name of the key to be used in $_SESSION storing the progress information
        'session.upload_progress.freq',//Defines how often the upload progress information should be updated
        'session.upload_progress.min_freq',//The minimum delay between updates, in seconds
        'session.lazy_write',//when set to 1, means that session data is only rewritten if it changes
        //session.bug_compat_42,PHP 4.2.3 以及更低版本有一个未公开的特性／错误
        //session.bug_compat_warn,PHP 4.2.3 以及更低版本有一个未公开的特性／错误
    ];

    protected static $constant=[
        SID,//包含着会话名以及会话 ID 的常量，格式为 "name=ID"，
        PHP_SESSION_DISABLED,//会话已禁用则返回 session_status() 的值
        PHP_SESSION_NONE,//在会话已启用但是没有会话的时候返回 session_status() 的值。
        PHP_SESSION_ACTIVE,//在一个会话已启用并存在时返回 session_status() 的值
    ];

    // 会话保存管理器
    public static function session_set_save_handler($openFunction,$closeFunction,$readFunction,$writeFunction,$destroyFunction,$gcFunction,$createSidFunction){return session_set_save_handler($openFunction,$closeFunction,$readFunction,$writeFunction,$destroyFunction,$gcFunction,$createSidFunction);}//设置用户自定义会话存储函数
    //bool session_set_save_handler ( SessionHandlerInterface $sessionhandler [, bool $register_shutdown = true ] ),自 PHP 5.4 开始

    // session 设置/获取 选项
    public static function session_name($name){return session_name($name);}//读取/设置会话名称
    public static function session_create_id($prefix){return session_create_id($prefix);}//Create new session id
    public static function session_id($id){return session_id($id);}//获取/设置当前会话 ID
    public static function session_regenerate_id($delete_old_session=false){return session_regenerate_id($delete_old_session);}//使用新生成的会话 ID 更新现有会话 ID
    public static function session_cache_expire($new_cache_expire){return session_cache_expire($new_cache_expire);}//返回当前缓存的到期时间
    public static function session_cache_limiter($cache_limiter){return session_cache_limiter($cache_limiter);}//读取/设置缓存限制器
    public static function session_set_cookie_params($lifetime,$path,$domain,$secure=false,$httponly=false){session_set_cookie_params($lifetime,$path,$domain,$secure,$httponly);}//设置会话 cookie 参数
    public static function session_get_cookie_params(){return session_get_cookie_params();}//获取会话 cookie 参数
    public static function session_module_name($module){return session_module_name($module);}//获取/设置会话模块名称
    public static function session_save_path($path){return session_save_path($path);}//读取/设置当前会话的保存路径
    public static function session_status(){return session_status();}//返回当前会话状态
    /**
     * 变量注册，自 PHP 5.4.0 起移除,
     * bool session_register ( mixed $name [, mixed $... ] )
     * bool session_is_registered ( string $name )
     * bool session_unregister ( string $name )
     */
    //
    public static function session_encode(){return session_encode();}//将当前会话数据编码为一个字符串
    public static function session_decode($data){return session_decode($data);}//解码会话数据,填充至$_SESSION
    // session 开启 操作 关闭
    public static function session_start($config=[]){session_start($config);}//启动新会话或者重用现有会话
    public static function session_reset(){session_reset();}//Re-initialize session array with original values
    public static function session_abort(){session_abort();}//Discard session array changes and finish session
    public static function session_unset(){session_unset();}//释放所有的会话变量
    public static function session_gc(){return session_gc();}//Perform session data garbage collection
    public static function session_destroy(){return session_destroy();}//销毁一个会话中的全部数据
    public static function session_write_close(){session_write_close();}//Write session data and end session
    public static function session_commit(){session_commit();}//session_write_close() 的别名
}

/**
 * Interface SessionHandlerInterface
 * 会话管理器接口
 */
interface SessionHandlerInterface extends \SessionHandlerInterface
{
    public function open($save_path,$session_name);//Initialize session,Called by session_start()
    public function read($session_id);//Read session data,Called by session_start()
    public function gc($maxlifetime);//Called by session_start(),
    public function destroy($session_id);//Destroy a session,Called by session_regenerate_id()
    public function write($session_id,$session_data);// Called by session_write_close()
    public function close();//Close the session,Called by session_write_close()
}

/**
 * the current internal PHP session save handler
 * 会话管理器
 */
class SessionHandler extends \SessionHandler implements \SessionHandlerInterface
{
    public function open($save_path, $session_name){return parent::open($save_path, $session_name);}//
    public function read($session_id){return parent::read($session_id);}
    public function gc($maxlifetime){return parent::gc($maxlifetime);}
    public function create_sid(){return parent::create_sid();}//
    public function destroy($session_id){return parent::destroy($session_id);}
    public function write($session_id, $session_data){parent::write($session_id, $session_data);}
    public function close(){parent::close();}
}