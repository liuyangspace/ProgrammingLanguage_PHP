<?php
/**
 * Memcached
 * 一个高性能分布式的内存对象缓存系统， 通常被用于降低数据库加载压力以提高动态web应用的响应速度。
 * 此扩展使用了libmemcached库提供的api与memcached服务端进行交互。它同样提供了一个session处理器（memcached）。
 * 它同时提供了一个session处理器（memcached）。
 * 关于libmemcached的更多信息可以在» http://libmemcached.org/libMemcached.html查看。
 */

namespace LanguageStatement\UtilComponent\Memcached;


class Memcached extends \Memcached
{
    public static $config=[
        'memcached.sess_locking',//开启session支持。有效值: On, Off, 默认值 On.
        'memcached.sess_consistent_hash',//Memcached 是否使用一致性哈希保存session。可以保证你在增加或删除memcached服务器节点的时候不会导致session大规模的失效,默认此项是关闭的。
        'memcached.sess_binary',//Memcached session是否使用二进制模式。如果Libmemcached 开启二进制模式。默认值是 Off.
        'memcached.sess_lock_wait',//Session 自旋锁等待时间（微秒）。默认值是150000
        'memcached.sess_prefix',//设置memcached session key的前缀。session前缀最长为219字节长的字符串。默认值是"memc.sess.key."。
        'memcached.sess_number_of_replicas',//使用memcached写session多少个副本。
        'memcached.sess_randomize_replica_read',//Memcached session 是否随机复制读。默认值0
        'memcached.sess_remove_failed',//是否允许自动剔除出故障的memcached服务器。默认值0
        'memcached.compression_type',//设置memcached的压缩类型，允许的值为fastlz, zlib。默认值是fastlz（快速无损压缩，性能不错）。
        'memcached.compression_factor',//压缩因子. 保存时压缩因子超过设置的极限才会将数据压缩存储。
        'memcached.compression_threshold',//压缩阈值。不压缩的序列化值低于此阈值。默认值是2000字节。
        'memcached.serializer',//设置缓存对象的默认序列化程序。有效值： php, igbinary, json, json_array.
        'memcached.use_sasl',//链接memcached服务器时启用SASL认证。有效值On, Off。默认值是Off。
        // Sessions支持
        'session.save_handler',//设置为memcached开启memcached的session处理器。
        'session.save_path',//定义一个逗号分隔的hostname:port样式的session缓存服务器池，例如： "sess1:11211, sess2:11211".
    ];

    // 服务器池
    public function __construct($persistent_id,$callback){parent::__construct($persistent_id,$callback);}//相同的persistent_id值创建的实例共享同一个连接。

    // option
    public static $option=[
        'Memcached::OPT_COMPRESSION',//开启或关闭压缩功能。
        'Memcached::OPT_SERIALIZER'=>[//指定对于非标量值进行序列化的序列化工具。
            'Memcached::SERIALIZER_PHP',//默认的PHP序列化工具（即serialize方法）。
            'Memcached::SERIALIZER_IGBINARY',//» igbinary序列化工具。它将php的数据结构 存储为紧密的二进制形式，在时间和空间上都有所改进。
            'Memcached::SERIALIZER_JSON',//JSON序列化，需要 PHP 5.2.10以上。
        ],
    ];
    public function setOption($option,$value){return parent::setOption($option,$value);}//设置一个memcached选项


    // Server
    public function addServer($host,$port,$weight=0){parent::addServer($host,$port,$weight);}//向服务器池中增加一个服务器



}