<?php
/**
 * PHP 网络相关
 */

namespace LanguageStatement\LanguageExtension\Streams\Network;


class Network
{
    protected static $config=[
        'user_agent',//定义 PHP 发送的 User-Agent。
        'default_socket_timeout',//基于 socket 的流的默认超时时间（秒）。
        'from',//定义匿名 ftp 的密码（email 地址）。
        'define_syslog_variables',//Whether or not to define the various syslog variables (e.g. $LOG_PID, $LOG_CRON, etc.).
    ];

    // DNS 记录类型
    const A         = "A";//主机记录,域名和IP地址的对应关系(一对多),
    const NS        = "NS";//名称服务器记录，用于说明这个区域有哪些DNS服务器负责解析
    const SOA       = "SOA";//起始授权机构记录,SOA记录说明了在众多NS记录里那一台才是主要的服务器
    const MX        = "MX";//邮件交换记录,在使用邮件服务器的时候，MX记录是无可或缺的
    const CNAME     = "CNAME";//别名记录,
    const SRV       = "SRV";//服务器资源记录(RFC2052),
    const PTR       = "PTR";//指针记录,A记录的逆向记录，作用是把IP地址解析为域名。
    const AAAA      = "AAAA";//IPV6地址记录,用来将域名解析到IPv6地址
    const A6        = "A6";//IPV6地址记录
    const TXT       = "TXT";//一般指为某个主机名或域名设置的说明。
    const NAPTR     = "NAPTR";//
    const ANY       = "ANY";//
    public static function checkdnsrr($host,$type="MX"){return checkdnsrr($host,$type);}//给指定的主机（域名）或者IP地址做DNS通信检查
    public static function dnsdns_check_record($host,$type="MX"){return dnsdns_check_record($host,$type);}//别名 checkdnsrr()
    public static function getmxrr($hostname,&$mxhosts,&$weight){return getmxrr($hostname,$mxhosts,$weight);}//Get MX records corresponding to a given Internet host name
    public static function dns_get_mx($hostname,&$mxhosts,&$weight){return dns_get_mx($hostname,$mxhosts,$weight);}//别名 getmxrr()
    public static function dns_get_record($hostname,$type=DNS_ANY,&$authns,&$addtl,&$raw=false){return dns_get_record($hostname,$type,$authns,$addtl,$raw);}//获取指定主机的DNS记录

    public static function gethostbyaddr($ip){return gethostbyaddr($ip);}//获取指定的IP地址对应的主机名
    public static function gethostbyname($hostname){return gethostbyname($hostname);}//获取指定主机名的IP地址
    public static function gethostbynamel($hostname){return gethostbynamel($hostname);}//获取指定主机名的IP地址数组
    public static function gethostname(){return gethostname();}//Gets the host name

    // protocol 协议 端口
    public static function getprotobyname($name){return getprotobyname($name);}//Get protocol number associated with protocol name
    public static function getprotobynumber($number){return getprotobynumber($number);}//Get protocol name associated with protocol number
    public static function getservbyname($service,$protocol){return getservbyname($service,$protocol);}//Get port number associated with an Internet service and protocol
    public static function getservbyport($port,$protocol){return getservbyport($port,$protocol);}//Get Internet service which corresponds to port and protocol
    // IP
    public static function inet_ntop($in_addr){return inet_ntop($in_addr);}//Converts a packed internet address to a human readable representation
    public static function inet_pton($address){return inet_pton($address);}//Converts a human readable IP address to its packed in_addr representation
    public static function ip2long($in_addr){return ip2long($in_addr);}//将一个IPV4的字符串互联网协议转换成数字格式
    public static function long2ip($proper_address){return long2ip($proper_address);}//Converts an long integer address into a string in (IPv4) Internet standard dotted format

    // http header
    public static function header($string,$replace=true,$http_response_code){header($string,$replace,$http_response_code);}//用于发送原生的 HTTP头
    public static function headers_list(){return headers_list();}//Returns a list of response headers sent (or ready to send)
    public static function header_remove($name){header_remove($name);}//Remove previously set headers
    public static function header_register_callback($callback){return header_register_callback($callback);}//Call a header function
    public static function headers_sent(&$file,&$line){return headers_sent($file,$line);}//Checks if or where headers have been sent
    public static function http_response_code($response_code){return http_response_code($response_code);}//Gets or sets the HTTP response status code
    // log
    public static function define_syslog_variables(){define_syslog_variables();}//Initializes all syslog related variables
    public static function openlog($ident,$option,$facility){return openlog($ident,$option,$facility);}//Open connection to system logger
    public static function syslog($priority,$message){return syslog($priority,$message);}//Generate a system log message
    public static function closelog(){return closelog();}//关闭系统日志链接

    // socket 参见Streams,Socket
    public static function fsockopen($hostname,$port=-1,&$errno,&$errstr,$timeout){return fsockopen($hostname,$port=-1,$errno,$errstr,$timeout);}//初始化一个套接字连接到指定主机
    public static function pfsockopen($hostname,$port=-1,&$errno,&$errstr,$timeout){return pfsockopen($hostname,$port,$errno,$errstr,$timeout);}//fsockopen()的长连接版本。

    //
}