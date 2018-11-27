<?php
/**
 * Created by PhpStorm.
 * User: VULCAN
 * Date: 2018/10/21
 * Time: 10:33
 */

namespace language\UtilComponent\Http;


class Http
{

    /**
     * 异步处理请求
     * @param $response    异步响应
     * @param int $timeout 异步最大执行时间
     */
    public static function asynchronousRequest($response,$timeout=600){
        ignore_user_abort();//客户端断开连接时不中断脚本的执行
        set_time_limit($timeout);//设置脚本最大执行时间
        echo $response;
        fastcgi_finish_request();
        ob_end_clean();
    }

}