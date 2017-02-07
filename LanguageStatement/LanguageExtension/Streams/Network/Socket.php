<?php
/**
 * PHP Socket
 * Socket扩展是基于流行的BSD sockets，实现了和socket通讯功能的底层接口，它可以和客户端一样当做一个socket服务器。
 * 想了解更通用的客户端socket接口，参见Streams。
 * 使用这些函数时请注意，虽然他们中有很多和C函数同名的，但声明却很可能不同。
 */

namespace LanguageStatement\LanguageExtension\Streams\Network;


class Socket
{
    // 协议簇
    protected $domain=[
        AF_INET,//IPv4 网络协议。TCP 和 UDP 都可使用此协议。
        AF_INET6,//IPv6 网络协议。TCP 和 UDP 都可使用此协议。
        AF_UNIX,//本地通讯协议。具有高性能和低成本的 IPC（进程间通讯）。
    ];

    // 套接字类型
    protected $type=[
        SOCK_STREAM,//提供一个顺序化的、可靠的、全双工的、基于连接的字节流。支持数据传送流量控制机制。TCP 协议即基于这种流式套接字。
        SOCK_DGRAM,//提供数据报文的支持。(无连接，不可靠、固定最大长度).UDP协议即基于这种数据报文套接字。
        SOCK_SEQPACKET,//提供一个顺序化的、可靠的、全双工的、面向连接的、固定最大长度的数据通信；数据端通过接收每一个数据段来读取整个数据包。
        SOCK_RAW,//提供读取原始的网络协议。这种特殊的套接字可用于手工构建任意类型的协议。一般使用这个套接字来实现 ICMP 请求（例如 ping）。
        SOCK_RDM,//提供一个可靠的数据层，但不保证到达顺序。一般的操作系统都未实现此功能。
    ];

    // 协议，可由getprotobyname(),参见Network,Streams
    protected $protocol=[

    ];

    // 套接字 选项 （socket_set_option，socket_get_option）
    protected $option=[
        SO_DEBUG,//whether debugging information is being recorded
        SO_BROADCAST,//whether transmission of broadcast messages is supported
        SO_REUSEADDR,//whether local addresses can be reused.
        SO_KEEPALIVE,//whether connections are kept active with periodic transmission of messages
        SO_DONTROUTE,//whether outgoing messages bypass the standard routing facilities.
        SO_LINGER,//Reports whether the socket lingers on socket_close() if data is present. By default, when the socket is closed, it attempts to send all unsent data
        SO_OOBINLINE,//whether the socket leaves out-of-band data inline
        SO_TYPE,//the socket type (e.g. SOCK_STREAM).
        SO_SNDBUF,//the size of the send buffer
        SO_RCVBUF,//the size of the receive buffer.
        SO_RCVLOWAT,//the minimum number of bytes to process for socket input operations.
        SO_SNDLOWAT,//the minimum number of bytes to process for socket output operations.
        SO_RCVTIMEO,//the timeout value for input operations.
        SO_SNDTIMEO,//the timeout value specifying the amount of time that an output function blocks because flow control prevents data from being sent.
        SO_ERROR,//information about error status and clears it.
        TCP_NODELAY,//whether the Nagle TCP algorithm is disabled.
        MCAST_JOIN_GROUP,//Joins a multicast group. (added in PHP 5.4)
        MCAST_LEAVE_GROUP,//Leaves a multicast group. (added in PHP 5.4)
        MCAST_BLOCK_SOURCE,//Blocks packets arriving from a specific source to a specific multicast group, which must have been previously joined
        MCAST_UNBLOCK_SOURCE,//Unblocks (start receiving again) packets arriving from a specific source address to a specific multicast group, which must have been previously joined
        MCAST_JOIN_SOURCE_GROUP,//Receive packets destined to a specific multicast group whose source address matches a specific value
        MCAST_LEAVE_SOURCE_GROUP,//Stop receiving packets destined to a specific multicast group whose soure address matches a specific value.
        IP_MULTICAST_IF,//The outgoing interface for IPv4 multicast packets
        IPV6_MULTICAST_IF,//The outgoing interface for IPv6 multicast packets
        IP_MULTICAST_LOOP,//The multicast loopback policy for IPv4 packets
        IPV6_MULTICAST_LOOP,//The multicast loopback policy for IPv6 packets
        IP_MULTICAST_TTL,//The time-to-live of outgoing IPv4 multicast packets.
        IPV6_MULTICAST_HOPS,//The time-to-live of outgoing IPv6 multicast packets.
    ];

    // create
    public static function socket_create($domain,$type,$protocol){return socket_create($domain,$type,$protocol);}//创建一个套接字（通讯节点）
    public static function socket_create_pair($domain,$type,$protocol,&$fd){return socket_create_pair($domain,$type,$protocol,$fd);}//Creates a pair of indistinguishable sockets and stores them in an array
    // options
    public static function socket_set_block($socket){return socket_set_block($socket);}//Sets blocking mode on a socket resource
    public static function socket_set_nonblock($socket){return socket_set_nonblock($socket);}//Sets nonblocking mode for file descriptor fd
    public static function socket_set_option($socket,$level,$optname,$optval){return socket_set_option($socket,$level,$optname,$optval);}//Sets socket options for the socket
    public static function socket_setopt($socket,$level,$optname,$optval){return socket_setopt($socket,$level,$optname,$optval);}//别名 socket_set_option()
    public static function socket_get_option($socket,$level,$optname){return socket_get_option($socket,$level,$optname);}//Gets socket options for the socket
    public static function socket_getopt($socket,$level,$optname){return socket_getopt($socket,$level,$optname);}//别名 socket_get_option()
    // bind
    public static function socket_bind($socket,$address,$port=0){return socket_bind($socket,$address,$port);}//给套接字绑定名字
    public static function socket_getsockname($socket,&$addr,&$port){return socket_getsockname($socket,$addr,$port);}//Queries the local side of the given socket which may either result in host/port or in a Unix filesystem path, dependent on its type
    public static function socket_getpeername($socket,&$addr,&$port){return socket_getpeername($socket,$addr,$port);}//Queries the remote side of the given socket which may either result in host/port or in a Unix filesystem path, dependent on its type
    // select
    public static function socket_select(&$read,&$write,&$except,$tv_sec,$tv_usec=0){return socket_select($read,$write,$except,$tv_sec,$tv_usec);}//Runs the select() system call on the given arrays of sockets with a specified timeout
    // service
    public static function socket_create_listen($port,$backlog=128){return socket_create_listen($port,$backlog);}
    public static function socket_listen($socket,$backlog=0){return socket_listen($socket,$backlog);}//Listens for a connection on a socket
    public static function socket_accept($socket){return socket_accept($socket);}//Accepts a connection on a socket
    // client
    public static function socket_connect($socket,$address,$port=0){return socket_connect($socket,$address,$port);}//开启一个套接字连接
    // IO streams
    public static function socket_import_stream($stream){return socket_import_stream($stream);}//Imports a stream that encapsulates a socket into a socket extension resource.
    public static function socket_cmsg_space($level,$type){return socket_cmsg_space($level,$type);}//Calculate message buffer size
    public static function socket_read($socket,$length,$type=PHP_BINARY_READ){return socket_read($socket,$length,$type);}//Reads a maximum of length bytes from a socket
    public static function socket_write($socket,$content,$length){return socket_write($socket,$content,$length);}//Write to a socket/
    public static function socket_recv($socket,&$content,$length,$flags){return socket_recv($socket,$content,$length,$flags);}//从已连接的socket接收数据
    public static function socket_recvmsg($socket,$content,$flags){return socket_recvmsg($socket,$content,$flags);}//Read a message
    public static function socket_recvfrom($socket,&$content,$length,$flags,&$name,&$port){return socket_recvfrom($socket,$content,$length,$flags,$name,$port);}//Receives data from a socket whether or not it is connection-oriented
    public static function socket_send($socket,$content,$length,$flags){return socket_send($socket,$content,$length,$flags);}//Sends data to a connected socket
    public static function socket_sendmsg($socket,$content,$flags){return socket_sendmsg($socket,$content,$flags);}//Send a message
    public static function socket_sendto($socket,$content,$length,$flags,&$name,&$port){return socket_sendto($socket,$content,$length,$flags,$name,$port);}//Sends a message to a socket, whether it is connected or not
    // error
    public static function socket_last_error($socket){return socket_last_error($socket);}//Returns the last error on the socket
    public static function socket_strerror($errno){return socket_strerror($errno);}//Return a string describing a socket error
    public static function socket_clear_error($socket){socket_clear_error($socket);}//清除套接字或者最后的错误代码上的错误
    // close
    public static function socket_shutdown($socket,$how=2){return socket_shutdown($socket,$how);}//Shuts down a socket for receiving, sending, or both
    public static function socket_close($socket){socket_close($socket);}//关闭套接字资源

}