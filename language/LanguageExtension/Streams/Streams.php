<?php
/**
 * PHP streams
 * a way of generalizing file, network, data compression,
 * and other operations which share a common set of functions and uses
 */

namespace LanguageStatement\LanguageExtension\Streams;


class Streams
{
    // PHP 支持协议
    protected static $protocol=[
        'file://',//访问本地文件系统
        'http://',//访问 HTTP(s) 网址
        'ftp://',//访问 FTP(s) URLs
        'ssh2:// ',//Secure Shell 2
        'php://',//访问各个输入/输出流（I/O streams）
        'zlib://',//压缩流
        'data://',//数据（RFC 2397）
        'glob://',//查找匹配的文件路径模式
        'phar://',//PHP 归档
        'rar://',//RAR
        'ogg://',//音频流
        'expect:// ',//处理交互式的流
    ];
    // 上下文
    protected static $context=[
        'socket'=>[//套接字
            'bindto',//网络的指定的IP地址（IPv4或IPv6其中的一个）和/或 端口号
            'backlog',//Used to limit the number of outstanding connections in the socket's listen queue.
        ],
        'http'=>[//https
            'method',//远程服务器支持的 GET，POST 或其它 HTTP 方法。
            'header',//请求期间发送的额外 header 。
            'user_agent',//要发送的 header User-Agent: 的值。
            'content',//在 header 后面要发送的额外数据。
            'proxy',//URI 指定的代理服务器的地址。
            'max_redirects',//跟随重定向的最大次数。
            //限于http(s)
            'request_fulluri',//当设置为 TRUE 时，在构建请求时将使用整个 URI 。(
            'follow_location',//跟随 Location header 的重定向。设置为 0 以禁用。
            'protocol_version',//HTTP 协议版本。
            'timeout',//读取超时时间，单位为秒（s），用 float 指定(e.g. 10.5)。
            'ignore_errors',//即使是故障状态码依然获取内容。
            //限于curl
            'curl_verify_ssl_host',//校验服务器。
            'curl_verify_ssl_peer',//要求对使用的SSL证书进行校验。
        ],
        'ftp'=>[//ftps
            'overwrite',//Allow overwriting of already existing files on remote server.
            'resume_pos',//File offset at which to begin transfer.
            'proxy',//Proxy FTP request via http proxy server.
        ],
        'ssl'=>[//tls
            'peer_name',//要连接的服务器名称。
            'verify_peer',//是否需要验证 SSL 证书。
            'verify_peer_name',//Require verification of peer name.
            'allow_self_signed',//是否允许自签名证书。
            'cafile',//当设置 verify_peer 为 true 时， 用来验证远端证书所用到的 CA 证书。
            'capath',//未设置 cafile，或者 cafile 所指的文件不存在时， 会在 capath 所指定的目录搜索适用的证书
            'local_cert',//本地证书路径。
            'local_pk',//如果使用独立的文件来存储证书（local_cert）和私钥， 那么使用此选项来指明私钥文件的路径。
            'passphrase',//local_cert 文件的密码。
            'CN_match',//期望远端证书的 CN 名称。
            'verify_depth',//如果证书链条层次太深，超过了本选项的设定值，则终止验证。
            'ciphers',//设置可用的密码列表。
            'capture_peer_cert',//如果设置为 TRUE 将会在上下文中创建 peer_certificate 选项， 该选项中包含远端证书。
            'capture_peer_cert_chain',//设置为 TRUE 将会在上下文中创建 peer_certificate_chain 选项， 该选项中包含远端证书链条
            'SNI_enabled',//设置为 TRUE 将启用服务器名称指示（server name indication）。
            'SNI_server_name',//那么其设置值将被视为 SNI 服务器名称。
            'disable_compression',//如果设置，则禁用 TLS 压缩，有助于减轻恶意攻击。
            'peer_fingerprint',//当远程服务器证书的摘要和指定的散列值不相同的时候， 终止操作。
        ],
        'phar'=>[
            'compress',//Phar compression constants 中的一个。
            'metadata',//Phar 元数据（metadata）。
        ],
        'mongodb'=>[
            'log_cmd_insert',//A callback function called when inserting a document
            'log_cmd_delete',//A callback function called when deleting a document
            'log_cmd_update',//A callback function called when updating a document
            'log_write_batch',//A callback function called when executing a Write Batch
            'log_reply',//A callback function called when reading a reply from MongoDB
            'log_getmore',//A callback function called when retrieving more results from a MongoDB cursor
            'log_killcursor',//A callback function called executing a killcursor opcode,
        ],
        'context'=>['notification'],//当一个流（stream）上发生事件时，callable 将被调用。
    ];

    //Stream filter 参见 PredefinedInterface/php_user_filter

    // wrapper 协议封装
    public static function stream_get_wrappers(){return stream_get_wrappers();}//获取已注册的流类型
    public static function stream_wrapper_register($protocol,$classname,$flags=0){return stream_wrapper_register($protocol,$classname,$flags);}//注册一个用 PHP 类实现的 URL 封装协议
    public static function stream_register_wrapper($protocol,$classname,$flags){ return stream_register_wrapper($protocol,$classname,$flags);}//别名 stream_wrapper_register()
    public static function stream_wrapper_unregister($protocol){return stream_wrapper_unregister($protocol);}//Unregister a URL wrapper
    public static function stream_wrapper_restore($protocol){return stream_wrapper_restore($protocol);}//Restores a previously unregistered built-in wrapper
    // stream 操作 拷贝 字符集
    public static function stream_copy_to_stream($fromStream,$toStream,$length=-1,$offset=0){return stream_copy_to_stream($fromStream,$toStream,$length,$offset);}//流拷贝
    public static function stream_encoding($stream,$encoding){return stream_encoding($stream,$encoding);}//设置数据流的字符集
    public static function stream_set_blocking($stream,$mode){return stream_set_blocking($stream,$mode);}//为资源流设置阻塞或者阻塞模式
    public static function socket_set_blocking($stream,$mode){return socket_set_blocking($stream,$mode);}//别名 stream_set_blocking()
    public static function stream_set_chunk_size($stream,$chunk_size){return stream_set_chunk_size($stream,$chunk_size);}//设置资源流区块大小
    public static function stream_set_read_buffer($stream,$buffer){return stream_set_read_buffer($stream,$buffer);}//Set read file buffering on the given stream
    public static function stream_set_write_buffer($stream,$buffer){return stream_set_write_buffer($stream,$buffer);}//Sets write file buffering on the given stream
    public static function stream_set_timeout($stream,$seconds,$microseconds=0){return stream_set_timeout($stream,$seconds,$microseconds);}//Set timeout period on a stream
    public static function socket_set_timeout($stream,$seconds,$microseconds=0){return socket_set_timeout($stream,$seconds,$microseconds);}//别名 stream_set_timeout()
    public static function stream_supports_lock($stream){return stream_supports_lock($stream);}//Tells whether the stream supports locking.

    public static function stream_get_contents($handle,$maxlength=-1,$offset=-1){return stream_get_contents($handle,$maxlength,$offset);}//读取资源流到一个字符串
    public static function stream_get_line($handle,$length,$ending){return stream_get_line($handle,$length,$ending);}//从资源流里读取一行直到给定的定界符

    public static function stream_get_meta_data($fp){return stream_get_meta_data($fp);}//从封装协议文件指针中取得报头／元数据
    public static function socket_get_status($fp){return socket_get_status($fp);}//别名 stream_get_meta_data()
    public static function stream_is_local($stream_or_url){return stream_is_local($stream_or_url);}//Checks if a stream is a local stream

    public static function stream_notification_callback($notification_code,$severity,$message,$message_code,$bytes_transferred,$bytes_max){stream_notification_callback($notification_code,$severity,$message,$message_code,$bytes_transferred,$bytes_max);}//A callback function for the notification context parameter
    public static function stream_select(&$read,&$write,&$except,$tv_sec,$tv_usec=0){return stream_select($read,$write,$except,$tv_sec,$tv_usec);}//Runs the equivalent of the select() system call on the given arrays of streams with a timeout specified by tv_sec and tv_usec
    public static function stream_resolve_include_path($filename){return stream_resolve_include_path($filename);}//Resolve filename against the include path
    // 块
    public static function stream_bucket_append($brigade,$bucket){stream_bucket_append($brigade,$bucket);}//Append bucket to brigade
    public static function stream_bucket_make_writeable($brigade){return stream_bucket_make_writeable($brigade);}//Return a bucket object from the brigade for operating on
    public static function stream_bucket_new($stream,$buffer){return stream_bucket_new($stream,$buffer);}//Create a new bucket for use on the current stream
    public static function stream_bucket_prepend($brigade,$bucket){stream_bucket_prepend($brigade,$bucket);}//Prepend bucket to brigade

    // context 资源上下文
    public static function stream_context_get_default($options){return stream_context_get_default($options);}//Retrieve the default stream context
    public static function stream_context_create($options,$params){return stream_context_create($options,$params);}//创建资源流上下文
    public static function stream_context_get_options($stream_or_context){return stream_context_get_options($stream_or_context);}//获取资源流/数据包/上下文的参数
    public static function stream_context_get_params($stream_or_context){return stream_context_get_params($stream_or_context);}//Retrieves parameters from a context
    public static function stream_context_set_default($options){return stream_context_set_default($options);}//Set the default stream context
    public static function stream_context_set_option($stream_or_context,$options){return stream_context_set_option($stream_or_context,$options);}//对资源流、数据包或者上下文设置参数
    public static function stream_context_set_params($stream_or_context,$params){return stream_context_set_params($stream_or_context,$params);}//Set parameters for a stream/wrapper/context

    // Stream filter
    public static function stream_get_filters(){return stream_get_filters();}//获取已注册的数据流过滤器列表
    public static function stream_filter_register($filtername,$classname){return stream_filter_register($filtername,$classname);}//Register a user defined stream filter
    public static function stream_filter_remove($stream_filter){return stream_filter_remove($stream_filter);}//从资源流里移除某个过滤器
    const STREAM_FILTER_READ        = STREAM_FILTER_READ;//
    const STREAM_FILTER_WRITE       = STREAM_FILTER_WRITE;//
    const STREAM_FILTER_ALL         = STREAM_FILTER_ALL;//
    public static function stream_filter_append($stream,$filtername,$read_write,$params){return stream_filter_append($stream,$filtername,$read_write,$params);}//Attach a filter to a stream
    public static function stream_filter_prepend($stream,$filtername,$read_write,$params){return stream_filter_prepend($stream,$filtername,$read_write,$params);}//Attach a filter to a stream

    // socket 参见 Network
    public static function stream_get_transports(){return stream_get_transports();}//获取已注册的套接字传输协议列表
    const STREAM_SERVER_BIND            = STREAM_SERVER_BIND;// UDP
    public static function stream_socket_server($local_socket,&$errno,&$errstr,$flags,$context){return stream_socket_server($local_socket,$errno,$errstr,$flags,$context);}//Create an Internet or Unix domain server socket
    public static function stream_socket_accept($server_socket,$timeout,&$peername){return stream_socket_accept($server_socket,$timeout,$peername);}//接受由 stream_socket_server() 创建的套接字连接
    const STREAM_CLIENT_CONNECT         = STREAM_CLIENT_CONNECT;//
    const STREAM_CLIENT_ASYNC_CONNECT   = STREAM_CLIENT_ASYNC_CONNECT;//
    const STREAM_CLIENT_PERSISTENT      = STREAM_CLIENT_PERSISTENT;//
    public static function stream_socket_client($remote_socket,&$errno,&$errstr,$timeout,$flags,$context){return stream_socket_client($remote_socket,$errno,$errstr,$timeout,$flags,$context);}//Open Internet or Unix domain socket connection
    const STREAM_SHUT_RD                = STREAM_SHUT_RD;//disable further receptions
    const STREAM_SHUT_WR                = STREAM_SHUT_WR;//disable further transmissions
    const STREAM_SHUT_RDWR              = STREAM_SHUT_RDWR;//disable further receptions and transmissions
    public static function stream_socket_shutdown($stream,$how){return stream_socket_shutdown($stream,$how);}//Shutdown a full-duplex connection

    public static function stream_socket_recvfrom($socket,$length,$flags=0,&$address){return stream_socket_recvfrom($socket,$length,$flags,$address);}//Receives data from a socket, connected or not
    public static function stream_socket_sendto($socket,$data,$flags=0,$address){return stream_socket_sendto($socket,$data,$flags,$address);}//Sends a message to a socket, whether it is connected or not

    public static function stream_socket_get_name($handle,$want_peer){return stream_socket_get_name($handle,$want_peer);}//获取本地或者远程的套接字名称
    /*
     * 加密类型
     * STREAM_CRYPTO_METHOD_SSLv2_CLIENT,STREAM_CRYPTO_METHOD_SSLv3_CLIENT,STREAM_CRYPTO_METHOD_SSLv23_CLIENT
     * STREAM_CRYPTO_METHOD_ANY_CLIENT
     * STREAM_CRYPTO_METHOD_TLS_CLIENT,STREAM_CRYPTO_METHOD_TLSv1_0_CLIENT,STREAM_CRYPTO_METHOD_TLSv1_1_CLIENT,STREAM_CRYPTO_METHOD_TLSv1_2_CLIENT
     * STREAM_CRYPTO_METHOD_SSLv2_SERVER,STREAM_CRYPTO_METHOD_SSLv3_SERVER,STREAM_CRYPTO_METHOD_SSLv23_SERVER
     * STREAM_CRYPTO_METHOD_ANY_SERVER
     * STREAM_CRYPTO_METHOD_TLS_SERVER,STREAM_CRYPTO_METHOD_TLSv1_0_SERVER,STREAM_CRYPTO_METHOD_TLSv1_1_SERVER,STREAM_CRYPTO_METHOD_TLSv1_2_SERVER
     */
    public static function stream_socket_enable_crypto($stream,$enable,$crypto_type,$session_stream){return stream_socket_enable_crypto($stream,$enable,$crypto_type,$session_stream);}//Turns encryption on/off on an already connected socket
    /*
     * domain 使用的协议族： STREAM_PF_INET, STREAM_PF_INET6 or STREAM_PF_UNIX
     * type 通信类型: STREAM_SOCK_DGRAM, STREAM_SOCK_RAW, STREAM_SOCK_RDM, STREAM_SOCK_SEQPACKET or STREAM_SOCK_STREAM
     * protocol 使用的传输协议: STREAM_IPPROTO_ICMP, STREAM_IPPROTO_IP, STREAM_IPPROTO_RAW, STREAM_IPPROTO_TCP or STREAM_IPPROTO_UDP
     */
    public static function stream_socket_pair($domain,$type,$protocol){return stream_socket_pair($domain,$type,$protocol);}//创建一对完全一样的网络套接字连接流

}