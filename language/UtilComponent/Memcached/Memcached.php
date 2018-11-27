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
    public static $constant=[
        'Memcached::HAVE_IGBINARY',//指示是否支持igbinary的序列化。
        'Memcached::HAVE_JSON',//指示是否支持json的序列化。
    ];

    // 服务器池
    public function __construct($persistent_id,$callback){parent::__construct($persistent_id,$callback);}//相同的persistent_id值创建的实例共享同一个连接。
    public function getStats(){return parent::getStats();}//获取服务器池的统计信息
    public function isPersistent(){return parent::isPersistent();}//Check if a persitent connection to memcache is being used
    public function isPristine(){return parent::isPristine();}//Check if the instance was recently created
    public function setSaslAuthData($username,$password){return parent::setSaslAuthData($username,$password);}//Set the credentials to use for authentication
    public function quit(){return parent::quit();}//关闭所有打开的链接。

    // option
    public static $option=[
        'Memcached::OPT_COMPRESSION',//开启或关闭压缩功能。
        'Memcached::OPT_SERIALIZER'=>[//指定对于非标量值进行序列化的序列化工具。
            'Memcached::SERIALIZER_PHP',//默认的PHP序列化工具（即serialize方法）。
            'Memcached::SERIALIZER_IGBINARY',//» igbinary序列化工具。它将php的数据结构 存储为紧密的二进制形式，在时间和空间上都有所改进。
            'Memcached::SERIALIZER_JSON',//JSON序列化，需要 PHP 5.2.10以上。
        ],
        'Memcached::OPT_PREFIX_KEY',//可以用于为key创建"域"。这个值将会被作为每个key的前缀
        'Memcached::OPT_HASH'=>[//指定存储元素key使用的hash算法。
            'Memcached::HASH_DEFAULT',//默认的(Jenkins one-at-a-time)元素key hash算法
            'Memcached::HASH_MD5',//md5元素key hash算法。
            'Memcached::HASH_CRC',//CRC元素key hash算法。
            'Memcached::HASH_FNV1_64',//FNV1_64元素key hash算法。
            'Memcached::HASH_FNV1A_64',//FNV1_64A元素key hash算法。
            'Memcached::HASH_FNV1_32',//FNV1_32元素key hash算法。
            'Memcached::HASH_FNV1A_32',//FNV1_32A元素key hash算法。
            'Memcached::HASH_HSIEH',//Hsieh元素key hash算法。
            'Memcached::HASH_MURMUR',//Murmur元素key hash算法。
        ],
        'Memcached::OPT_DISTRIBUTION'=>[//指定元素key分布到各个服务器的方法。
            'Memcached::DISTRIBUTION_MODULA',//余数分布算法。
            'Memcached::DISTRIBUTION_CONSISTENT',//一致性分布算法(基于libketama).
        ],
        'Memcached::OPT_LIBKETAMA_COMPATIBLE',//开启或关闭兼容的libketama类行为。如果你要使用一致性hash算法强烈建议开启此选项
        'Memcached::OPT_BUFFER_WRITES',//开启或关闭I/O缓存。
        'Memcached::OPT_BINARY_PROTOCOL',//开启使用二进制协议。这个选项不能在一个打开的连接上进行切换。
        'Memcached::OPT_NO_BLOCK',//开启或关闭异步I/O。这将使得存储函数传输速度最大化。
        'Memcached::OPT_TCP_NODELAY',//开启或关闭已连接socket的无延迟特性（在某些幻境可能会带来速度上的提升）。
        'Memcached::OPT_SOCKET_SEND_SIZE',//socket发送缓冲的最大值。
        'Memcached::OPT_SOCKET_RECV_SIZE',//socket接收缓冲的最大值。
        'Memcached::OPT_CONNECT_TIMEOUT',//在非阻塞模式下这里设置的值就是socket连接的超时时间，单位是毫秒。
        'Memcached::OPT_RETRY_TIMEOUT',//等待失败的连接重试的时间，单位秒。
        'Memcached::OPT_SEND_TIMEOUT',//socket发送超时时间，单位毫秒。
        'Memcached::OPT_RECV_TIMEOUT',//socket读取超时时间，单位毫秒。
        'Memcached::OPT_POLL_TIMEOUT',//poll连接超时时间，单位毫秒。
        'Memcached::OPT_CACHE_LOOKUPS',//开启或禁用DNS查找缓存。
        'Memcached::OPT_SERVER_FAILURE_LIMIT',//指定一个服务器连接的失败重试次数限制。
    ];
    public function setOption($option,$value){return parent::setOption($option,$value);}//设置一个memcached选项
    public function setOptions(Array $options){return parent::setOptions($options);}//Set Memcached options
    public function getOption($option){return parent::getOption($option);}//获取Memcached的选项值

    // Server
    public function addServer($host,$port,$weight=0){parent::addServer($host,$port,$weight);}//向服务器池中增加一个服务器
    public function addServers(array $servers){return parent::addServers($servers);}//向服务器池中增加多台服务器
    public function getServerList(){return parent::getServerList();}//获取服务器池中的服务器列表
    public function getVersion(){return parent::getVersion();}//获取服务器池中所有服务器的版本信息
    public function resetServerList(){return parent::resetServerList();}//Clears all servers from the server list

    // 元素时限 expiration
    public function touch($key,$expiration){return parent::touch($key,$expiration);}//Set a new expiration on an item
    public function touchByKey($server_key,$key,$expiration){return parent::touchByKey($server_key,$key,$expiration);}//Set a new expiration on an item on a specific server

    // key value
    public function getAllKeys(){return parent::getAllKeys();}//Gets the keys stored on all the servers
    public function get($key,callable $cache_cb=null,&$cas_token=null){return parent::get($key,$cache_cb,$cas_token);}//检索一个元素
    public function getByKey($server_key,$key,callable $cache_cb=null,&$cas_token=null){return parent::getByKey($server_key,$key,$cache_cb,$cas_token);}//从特定的服务器检索元素

    public function getDelayed(array $keys,$with_cas=null,callable $value_cb=null){return getDelayed($keys,$with_cas,$value_cb);}//请求多个元素
    public function getDelayedByKey($server_key,array $keys,$with_cas=null,callable $value_cb=null){return parent::getDelayedByKey($server_key,$keys,$with_cas,$value_cb);}//从指定的服务器上请求多个元素
    public function fetch(){return parent::fetch();}//抓取下一个结果
    public function fetchAll(){return parent::fetchAll();}//抓取所有剩余的结果

    public function add($key,$value,$expiration=null){return parent::add($key,$value,$expiration);}//向一个新的key下面增加一个元素
    public function addByKey($server_key,$key,$value,$expiration=null){return parent::addByKey($server_key,$key,$value,$expiration);}//在指定服务器上的一个新的key下增加一个元素
    public function prepend($key, $value){return parent::prepend($key, $value);}//向一个已存在的元素前面追加数据
    public function prependByKey($server_key,$key,$value){return parent::prependByKey($server_key,$key,$value);}//Prepend data to an existing item on a specific server
    public function append($key, $value){return parent::append($key, $value);}//向已存在元素后追加数据
    public function appendByKey($server_key,$key,$value){return parent::appendByKey($server_key,$key,$value);}//向指定服务器上已存在元素后追加数据

    public function increment($key,$offset=1,$initial_value=0,$expiry=0){return parent::increment($key,$offset,$initial_value,$expiry);}//增加数值元素的值
    public function incrementByKey($server_key,$key,$offset=1,$initial_value=0,$expiry=0){return parent::incrementByKey($server_key,$key,$offset,$initial_value,$expiry);}//Increment numeric item's value, stored on a specific server
    public function decrement($key,$offset=1,$initial_value=0,$expiry=0){return parent::decrement($key,$offset,$initial_value,$expiry);}//减小数值元素的值
    public function decrementByKey($server_key,$key,$offset=1,$initial_value=0,$expiry=0){return parent::decrementByKey($server_key,$key,$offset,$initial_value,$expiry);}//减小数值元素的值

    public function replace($key,$value,$expiration=null){return parent::replace($key,$value,$expiration);}//替换已存在key下的元素
    public function replaceByKey($server_key,$key,$value,$expiration=null){return parent::replaceByKey($server_key,$key,$value,$expiration);}//Replace the item under an existing key on a specific server
    public function cas($cas_token,$key,$value,$expiration=null){parent::cas($cas_token,$key,$value,$expiration);}//比较并交换值（乐观锁）
    public function casByKey($cas_token,$server_key,$key,$value,$expiration=null){return parent::casByKey($cas_token,$server_key,$key,$value,$expiration);}//在指定服务器上比较并交换值（乐观锁）

    public function set($key,$value,$expiration=null){return parent::set($key,$value,$expiration);}//存储一个元素
    public function setByKey($server_key,$key,$value,$expiration=null){return parent::setByKey($server_key,$key,$value,$expiration);}//Store an item on a specific server
    public function setMulti(array $items,$expiration=null){return parent::setMulti($items, $expiration);}//存储多个元素
    public function setMultiByKey($server_key,array $items,$expiration=null){return parent::setMultiByKey($server_key,$items, $expiration);}//存储多个元素

    public function delete($key,$time=0){return parent::delete($key,$time);}//删除一个元素
    public function deleteByKey($server_key,$key,$time=0){return parent::deleteByKey($server_key,$key,$time);}//从指定的服务器删除一个元素
    public function deleteMulti(Array $keys,$time=0){return parent::deleteMulti($keys,$time);}//Delete multiple items
    public function deleteMultiByKey($server_key,Array $keys,$time=0){return parent::deleteMultiByKey($server_key,$keys,$time);}//Delete multiple items from a specific server
    public function flush($delay=0){return parent::flush($delay);}//作废缓存中的所有元素
    // 操作的结果
    public function getResultCode(){return parent::getResultCode();}//返回最后一次操作的结果代码
    public function getResultMessage(){return parent::getResultMessage();}//返回最后一次操作的结果描述消息
}