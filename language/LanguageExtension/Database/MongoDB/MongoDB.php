<?php
/**
 * MongoDB
 * 由C++语言实现的，基于分布式文件存储的数据库。
 * 是一个介于关系数据库和非关系数据库之间的产品，是非关系数据库当中功能最丰富，最像关系数据库的。
 * 文件存储格式为BSON。BSON（）是一种类json的一种二进制形式的存储格式。
 * 连接 URI: mongodb://[username:password@]host1[:port1][,host2[:port2],...[,hostN[:portN]]][/[database][?options]]
 */

namespace LanguageStatement\LanguageExtension\Database\MongoDB;


class MongoDB
{

    public static $config=[
        'mongodb.debug',//
    ];

    public static $constant=[
        'MONGODB_VERSION',//x.y.z style version number of the extension
        'MONGODB_STABILITY',//Current stability (alpha/beta/stable)
    ];
}