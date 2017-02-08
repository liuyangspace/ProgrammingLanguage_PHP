<?php
/**
 * Curl
 * PHP 支持 Daniel Stenberg 创建的 libcurl 库，能够连接通讯各种服务器、使用各种协议。
 * libcurl 目前支持的协议有:
 *      http、https、ftp(文件传输协议)、gopher(信息查找系统)、dict、file、
 *      telnet(远程终端协议,Internet远程登陆服务的标准协议和主要方式)、ldap(轻量目录访问协议)。
 * libcurl 同时支持 HTTPS 证书、HTTP POST、HTTP PUT、 FTP 上传(也能通过 PHP 的 FTP 扩展完成)、
 * HTTP 基于表单的上传、代理、cookies、用户名+密码的认证。
 * https://curl.haxx.se/
 */

namespace LanguageStatement\UtilComponent\Curl;


class Curl
{
    public static $config=[
        'curl.cainfo',//CURLOPT_CAINFO 选项的一个默认值。这个值必须是一个绝对路径。
    ];
    public static $option=[
        // 全局
        'CURLOPT_MUTE',//TRUE时将完全静默，无论是何 cURL 函数。
        'CURLOPT_NOSIGNAL',//TRUE 时忽略所有的 cURL 传递给 PHP 进行的信号。
        'CURLOPT_TIMEOUT',//允许 cURL 函数执行的最长秒数。
        'CURLOPT_TIMEOUT_MS',//设置cURL允许执行的最长毫秒数。
        'CURLOPT_IPRESOLVE',//Allows an application to select what kind of IP addresses to use ,default CURL_IPRESOLVE_WHATEVER.
        'CURLOPT_PRIVATE',//Any data that should be associated with this cURL handle
        'CURLOPT_RANGE',//以"X-Y"的形式，其中X和Y都是可选项获取数据的范围，以字节计。
        // DNS缓存
        'CURLOPT_DNS_USE_GLOBAL_CACHE',//TRUE 会启用一个全局的DNS缓存。此选项非线程安全的，默认已开启。
        'CURLOPT_DNS_CACHE_TIMEOUT',//设置在内存中缓存 DNS 的时间，默认为120秒（两分钟）。
        //
        'CURLOPT_BUFFERSIZE',//每次读入的缓冲的尺寸。当然不保证每次都会完全填满这个尺寸。
        // 连接
        'CURLOPT_PROTOCOLS',//启用时，会限制 libcurl 在传输过程中可使用哪些协议。
        'CURLOPT_INTERFACE',//发送的网络接口（interface），可以是一个接口名、IP 地址或者是一个主机名。
        'CURLOPT_PORT',//用来指定连接端口。
        'CURLOPT_CONNECTTIMEOUT',//在尝试连接时等待的秒数。设置为0，则无限等待。
        'CURLOPT_CONNECTTIMEOUT_MS',//尝试连接等待的时间，以毫秒为单位。设置为0，则无限等待。
        'CURLOPT_MAXCONNECTS',//允许的最大连接数量。达到限制时，会通过CURLOPT_CLOSEPOLICY决定应该关闭哪些连接。
        'CURLOPT_FRESH_CONNECT',//TRUE 强制获取一个新的连接，而不是缓存中的连接。
        'CURLOPT_FORBID_REUSE',//TRUE 在完成交互以后强制明确的断开连接，不能在连接池中重用。
        'CURLOPT_NETRC',//TRUE时，在连接建立时，访问~/.netrc文件获取用户名和密码来连接远程站点。
        // TCP
        'CURLOPT_TCP_NODELAY',//TRUE 时禁用 TCP 的 Nagle 算法，就是减少网络上的小包数量。
        // header
        'CURLOPT_HEADER',//启用时会将头文件的信息作为数据流输出。
        'CURLOPT_HTTP_VERSION',//CURL_HTTP_VERSION_NONE (默认值，让 cURL 自己判断使用哪个版本)
        'CURLOPT_ENCODING',//HTTP请求头中"Accept-Encoding: "的值。
        'CURLOPT_URL',//需要获取的 URL 地址，也可以在curl_init() 初始化会话的时候。
        'CURLOPT_USERAGENT',//在HTTP请求中包含一个"User-Agent: "头的字符串。
        'CURLOPT_USERPWD',//传递一个连接中需要的用户名和密码，格式为："[username]:[password]"。
        'CURLOPT_HTTPHEADER',//设置 HTTP 头字段的数组。格式： array('Content-type: text/plain', 'Content-length: 100')
        'CURLOPT_HTTP200ALIASES',//HTTP 200 响应码数组，数组中的响应码被认为是正确的响应，而非错误。
        // 重定向
        'CURLOPT_REFERER',//在HTTP请求头中"Referer: "的内容。
        'CURLOPT_AUTOREFERER',//TRUE 时将根据 Location: 重定向时，自动设置 header 中的Referer:信息。
        'CURLOPT_FOLLOWLOCATION',//TRUE时将会根据服务器返回 HTTP 头中的 "Location: " 重定向。
        'CURLOPT_MAXREDIRS',//指定最多的 HTTP 重定向次数，这个选项是和CURLOPT_FOLLOWLOCATION一起使用的。
        'CURLOPT_UNRESTRICTED_AUTH',//TRUE 在使用CURLOPT_FOLLOWLOCATION重定向 header 中的多个 location 时继续发送用户名和密码信息，哪怕主机名已改变。
        'CURLOPT_POSTREDIR',//位掩码，1 (301 永久重定向), 2 (302 Found) 和 4 (303 See Other)
        'CURLOPT_REDIR_PROTOCOLS',//限制 libcurl 在 CURLOPT_FOLLOWLOCATION开启时，使用的协议。
        // 方法 GET POST HEAD PUT
        'CURLOPT_CUSTOMREQUEST',//HTTP 请求时，使用自定义的 Method ,有效值如 "GET"，"POST"，"CONNECT",'DELETE'等等(不确定服务器支持这个自定义方法则不要使用它。)
        // GET
        'CURLOPT_HTTPGET',//TRUE时会设置 HTTP 的 method 为 GET，默认是 GET
        // POST
        'CURLOPT_POST',//TRUE 时会发送 POST 请求，类型为：application/x-www-form-urlencoded
        'CURLOPT_POSTFIELDS',/* 全部数据使用HTTP协议中的 "POST" 操作来发送。 要发送文件，在文件名前面加上@前缀
                                并使用完整路径。 文件类型可在文件名后以 ';type=mimetype' 的格式指定。 这个参数
                                可以是 urlencoded 后的字符串，类似'para1=val1&para2=val2&...'，也可以使用一个
                                以字段名为键值，字段数据为值的数组。 如果value是一个数组，Content-Type头将会被
                                设置成multipart/form-data。 从 PHP 5.2.0 开始，使用 @前缀传递文件时，value 必
                                须是个数组。 从 PHP 5.5.0 开始, @ 前缀已被废弃，文件可通过 CURLFile 发送。 设
                                置 CURLOPT_SAFE_UPLOAD 为 TRUE 可禁用 @前缀发送文件，以增加安全性。  */
        // File
        'CURLOPT_INFILE',//上传文件时需要读取的文件。
        'CURLOPT_SAFE_UPLOAD',//TRUE 禁用 @ 前缀在 CURLOPT_POSTFIELDS 中发送文件。 意味着 @ 可以在字段中安全得使用了。 可使用 CURLFile 作为上传的代替。
        'CURLOPT_UPLOAD',//TRUE准备上传。
        'CURLOPT_INFILESIZE',//希望传给远程站点的文件尺寸，字节(byte)为单位。
        'CURLOPT_READFUNCTION',//
        'CURLOPT_WRITEFUNCTION',//
        // HEAD
        'CURLOPT_NOBODY',//TRUE时将不输出 BODY 部分。同时 Mehtod 变成了 HEAD。
        // PUT
        'CURLOPT_PUT',//TRUE 时允许 HTTP 发送文件。要被 PUT 的文件必须在 CURLOPT_INFILE和CURLOPT_INFILESIZE 中设置。
        //
        'CURLINFO_HEADER_OUT',//TRUE 时追踪句柄的请求字符串。
        // HTTP 验证方法
        'CURLOPT_HTTPAUTH',//使用的 HTTP 验证方法。
        // HTTP 代理
        'CURLOPT_PROXY',//HTTP 代理通道。
        'CURLOPT_PROXYUSERPWD',//一个用来连接到代理的"[username]:[password]"格式的字符串。
        'CURLOPT_HTTPPROXYTUNNEL',//TRUE会通过指定的 HTTP 代理来传输。
        'CURLOPT_PROXYPORT',//代理服务器的端口。端口也可以在CURLOPT_PROXY中设置。
        'CURLOPT_PROXYTYPE',//可以是 CURLPROXY_HTTP (默认值) CURLPROXY_SOCKS4、 CURLPROXY_SOCKS5、 CURLPROXY_SOCKS4A 或 CURLPROXY_SOCKS5_HOSTNAME。
        'CURLOPT_PROXYAUTH',//HTTP 代理连接的验证方式。
        // cookie 会话
        'CURLOPT_COOKIESESSION',//设为 TRUE时将开启新的一次 cookie 会话。
        'CURLOPT_COOKIE',//设定 HTTP 请求中"Cookie: "部分的内容。多个 cookie 用分号分隔，分号后带一个空格(例如， "fruit=apple; colour=red")。
        'CURLOPT_COOKIEFILE',//包含 cookie 数据的文件名，cookie 文件的格式可以是 Netscape 格式，或者只是纯 HTTP 头部风格，存入文件。
        'CURLOPT_COOKIEJAR',//连接结束后，比如，调用 curl_close 后，保存 cookie 信息的文件。
        //
        'CURLOPT_CONNECT_ONLY',//TRUE 将让库执行所有需要的代理、验证、连接过程，但不传输数据。(用于 HTTP、SMTP 和 POP3)
        // 内容处理
        'CURLOPT_CRLF',//启用时将Unix的换行符转换成回车换行符。
        // 传输
        'CURLOPT_NOPROGRESS',//TRUE 时关闭 cURL 的传输进度。
        'CURLOPT_LOW_SPEED_TIME',//当传输速度小于CURLOPT_LOW_SPEED_LIMIT时(bytes/sec)，PHP会根据CURLOPT_LOW_SPEED_TIME来判断是否因太慢而取消传输。
        'CURLOPT_LOW_SPEED_LIMIT',//传输速度，每秒字节（bytes）数，根据CURLOPT_LOW_SPEED_TIME秒数统计是否因太慢而取消传输。
        'CURLOPT_RESUME_FROM',//传递字节为单位的偏移量（用来断点续传）。
        'CURLOPT_MAX_RECV_SPEED_LARGE',//
        'CURLOPT_MAX_SEND_SPEED_LARGE',//
        'CURLOPT_PROGRESSFUNCTION',//
        // FTP
        'CURLOPT_FTP_USE_EPRT',//TRUE 时，当 FTP 下载时，使用 EPRT (和 LPRT)命令
        'CURLOPT_FTP_USE_EPSV',//TRUE 时，在FTP传输过程中，回到 PASV 模式前，先尝试 EPSV 命令。
        'CURLOPT_FTP_CREATE_MISSING_DIRS',//TRUE 时，当 ftp 操作不存在的目录时将创建它。
        'CURLOPT_FTPAPPEND',//TRUE 为追加写入文件，而不是覆盖。
        'CURLOPT_TRANSFERTEXT',//TRUE对 FTP 传输使用 ASCII 模式
        'CURLOPT_FTPASCII',//CURLOPT_TRANSFERTEXT 的别名。
        'CURLOPT_FTPLISTONLY',//TRUE 时只列出 FTP 目录的名字。
        'CURLOPT_FTPSSLAUTH',//FTP验证方式（启用的时候）：CURLFTPAUTH_SSL (首先尝试SSL)，
        'CURLOPT_FTPPORT',//这个值将被用来获取供FTP"PORT"指令所需要的IP地址。
        'CURLOPT_KRB4LEVEL',//KRB4 (Kerberos 4) 安全级别。下面的任何值都是有效的(从低到高的顺序)："clear"、"safe"、"confidential"、"private".。
        'CURLOPT_POSTQUOTE',//在 FTP 请求执行完成后，在服务器上执行的一组array格式的 FTP 命令。
        'CURLOPT_QUOTE',//一组先于 FTP 请求的在服务器上执行的FTP命令。
        // 输出  (CURLOPT_HEADER)
        'CURLOPT_FILE',//设置输出文件，默认为STDOUT (浏览器)。
        'CURLOPT_RETURNTRANSFER',//TRUE将curl_exec()获取的信息以字符串返回，而不是直接输出。
        'CURLOPT_BINARYTRANSFER',//启用 CURLOPT_RETURNTRANSFER 时，返回原生的（Raw）输出。
        'CURLOPT_FAILONERROR',//当 HTTP 状态码大于等于 400，TRUE 将将显示错误详情。
        'CURLOPT_FILETIME',//TRUE时，会尝试获取远程文档中的修改时间信息。curl_getinfo()
        'CURLOPT_STDERR',//错误输出的地址，取代默认的STDERR。
        'CURLOPT_WRITEHEADER',//设置 header 部分内容的写入的文件地址。
        'CURLOPT_HEADERFUNCTION',//设置一个回调函数，第一个参数是cURL的资源句柄，第二个是输出的 header 数据。header数据的输出必须依赖这个函数，返回已写入的数据大小。
        // SSL 证书信息
        'CURLOPT_CERTINFO',//TRUE 将在安全传输时输出 SSL 证书信息到 STDERR。(需要开启 CURLOPT_VERBOSE )
        'CURLOPT_SSL_VERIFYPEER',//FALSE禁止 cURL 验证对等证书（peer's certificate）。要验证的交换证书可以在 CURLOPT_CAINFO 选项中设置，或在 CURLOPT_CAPATH中设置证书目录。
        'CURLOPT_SSL_VERIFYHOST',//设置为 1 是检查服务器SSL证书中是否存在一个公用名,设置成 2，会检查公用名是否存在，并且是否与提供的主机名匹配。 在生产环境中，这个值应该是 2（默认值）。
        'CURLOPT_CAINFO',//一个保存着1个或多个用来让服务端验证的证书的文件名。
        'CURLOPT_CAPATH',//一个保存着多个CA证书的目录。这个选项是和CURLOPT_SSL_VERIFYPEER一起使用的。
        'CURLOPT_SSLVERSION',//(最好别设置这个值，让它使用默认值)
        'CURLOPT_EGDSOCKET',//类似CURLOPT_RANDOM_FILE，除了一个Entropy Gathering Daemon套接字。
        'CURLOPT_KEYPASSWD',//使用 CURLOPT_SSLKEY或 CURLOPT_SSH_PRIVATE_KEYFILE 私钥时候的密码。
        'CURLOPT_RANDOM_FILE',//一个被用来生成 SSL 随机数种子的文件名。
        'CURLOPT_SSH_HOST_PUBLIC_KEY_MD5',//包含 32 位长的 16 进制数值。这个字符串应该是远程主机公钥（public key） 的 MD5 校验值。
        'CURLOPT_SSH_PUBLIC_KEYFILE',//The file name for your public key.
        'CURLOPT_SSH_PRIVATE_KEYFILE',//The file name for your private key..
        'CURLOPT_SSL_CIPHER_LIST',//一个SSL的加密算法列表。
        'CURLOPT_SSLCERT',//一个包含 PEM 格式证书的文件名。
        'CURLOPT_SSLCERTPASSWD',//使用CURLOPT_SSLCERT证书需要的密码。
        'CURLOPT_SSLCERTTYPE',//使用CURLOPT_SSLCERT证书需要的密码。
        'CURLOPT_SSH_AUTH_TYPES',//证书的类型。支持的格式有"PEM" (默认值), "DER"和"ENG"。
        'CURLOPT_SSLENGINE',//用来在CURLOPT_SSLKEY中指定的SSL私钥的加密引擎变量。
        'CURLOPT_SSLENGINE_DEFAULT',//用来做非对称加密操作的变量。
        'CURLOPT_SSLKEY',//包含 SSL 私钥的文件名。
        'CURLOPT_SSLKEYPASSWD',//在 CURLOPT_SSLKEY中指定了的SSL私钥的密码。
        'CURLOPT_SSLKEYTYPE',//CURLOPT_SSLKEY中规定的私钥的加密类型，支持的密钥类型为"PEM"(默认值)、"DER"和"ENG"。
        // info
        'CURLOPT_VERBOSE',//TRUE 会输出所有的信息，写入到STDERR，或在CURLOPT_STDERR中指定的文件。
        //
        'CURLOPT_TIMECONDITION',//设置如何对待 CURLOPT_TIMEVALUE。
        'CURLOPT_TIMEVALUE',//秒数，从 1970年1月1日开始。这个时间会被 CURLOPT_TIMECONDITION使。
        //
        'CURLOPT_PASSWDFUNCTION',//设置一个回调函数，有三个参数，第一个是cURL的资源句柄，第二个是一个密码提示符，第三个参数是密码长度允许的最大值。返回密码的值。
        'CURLOPT_SHARE',//curl_share_init() 返回的结果。 使 cURL 可以处理共享句柄里的数据。
    ];

    // 初始化
    public static function curl_init($url=NULL){return curl_init($url);}//初始化一个cURL会话
    // 设置
    public static function curl_setopt($ch,$option,$value){}//设置一个cURL传输选项
    public static function curl_setopt_array($ch,Array $option){return curl_setopt_array($ch,$option);}//为cURL传输会话批量设置选项
    public static function curl_reset($ch){curl_reset($ch);}//重置一个 libcurl 会话句柄的所有的选项
    //
    public static function curl_copy_handle($ch){return curl_copy_handle($ch);}//复制一个cURL句柄和它的所有选项
    public static function curl_escape($ch,$str){return curl_escape($ch,$str);}//使用 URL 编码给定的字符串
    public static function curl_pause($ch,$bitmask){return curl_pause($ch,$bitmask);}//Pause and unpause a connection
    public static function curl_unescape($ch,$str){return curl_unescape($ch,$str);}//解码给定的 URL 编码的字符串
    public static function curl_file_create($filename,$mimetype='', $postname=''){return curl_file_create($filename,$mimetype,$postname);}//创建一个 CURLFile 对象此函数是该函数的别名： CURLFile::__construct()
    // 执行
    public static function curl_exec($ch){return curl_exec($ch);}//执行一个cURL会话
    // 错误
    public static function curl_errno($ch){return curl_errno($ch);}//返回最后一次的错误号
    public static function curl_error($ch){return curl_error($ch);}//返回一个保护当前会话最近一次错误的字符串
    public static function curl_strerror($errornum){return curl_strerror($errornum);}//Return string describing the given error code
    // 信息
    public static function curl_getinfo($ch,$opt=0){return curl_getinfo($ch,$opt);}//获取一个cURL连接资源句柄的信息
    // 关闭
    public static function curl_close($ch){curl_close($ch);}//关闭一个cURL会话
    // curl批处理
    public static function curl_multi_init(){return curl_multi_init();}//返回一个新cURL批处理句柄
    public static function curl_multi_add_handle($mh,$ch){return curl_multi_add_handle($mh,$ch);}//向curl批处理会话中添加单独的curl句柄
    public static function curl_multi_setopt($mh,$option,$value){return curl_multi_setopt($mh,$option,$value);}//为 cURL 并行处理设置一个选项
    public static function curl_multi_exec($mh,&$still_running){return curl_multi_exec($mh,$still_running);}//运行当前 cURL 句柄的子连接
    public static function curl_multi_select($mh,$timeout=1.0){return curl_multi_select($mh,$timeout);}//
    public static function curl_multi_info_read($mh,&$msgs_in_queue=NULL){return curl_multi_info_read($mh,$msgs_in_queue);}//
    public static function curl_multi_getcontent($ch){return curl_multi_getcontent($ch);}//如果设置了CURLOPT_RETURNTRANSFER，则返回获取的输出的文本流
    public static function curl_multi_strerror($errornum){return curl_multi_strerror($errornum);}//Return string describing error code
    public static function curl_multi_remove_handle($mh,$ch){return curl_multi_remove_handle($mh,$ch);}//移除curl批处理句柄资源中的某个句柄资源
    public static function curl_multi_close($mh){curl_multi_close($mh);}//关闭一组cURL句柄
    // share
    public static function curl_share_init(){return curl_share_init();}//Allows to share data between cURL handles.
    public static function curl_share_setopt($sh,$option,$value){return curl_share_setopt($sh,$option,$value);}//Set an option for a cURL share handle.
    public static function curl_share_close($sh){curl_share_close($sh);}//Close a cURL share handle
    //
    public static function curl_version($age=CURLVERSION_NOW){return curl_version($age);}//获取cURL版本信息
}