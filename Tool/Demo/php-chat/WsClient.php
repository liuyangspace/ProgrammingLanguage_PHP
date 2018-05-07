<?php

/**
 * 客户端
 * 基于 posix,pcntl,sockets 的简易聊天室
 */

class WsClient
{
    const SESSION_END=':q'.PHP_EOL;

    public function start($ip,$port)
    {
        $socket = socket_create(AF_INET,SOCK_STREAM,SOL_TCP);
        if(socket_connect($socket,$ip,(int)$port)===false) exit("connect fail");;
        //
        socket_set_nonblock($socket);

        //产生子进程分支
        $pid = pcntl_fork();
        if ($pid == -1) {
            exit("could not fork"); //pcntl_fork返回-1标明创建子进程失败
        } else if ($pid) {
            // 父进程;
            // 接受命令行输入并发送给服务器
            while(true){
                $in=fgets(STDIN);
                socket_write($socket,$in,strlen($in));
                if($in==self::SESSION_END){//会话结束
                    if(posix_kill($pid,SIGTERM)) exit("client parent end!\n");
                }
            }
        } else {
            // 子进程
            // 安装信号量
            pcntl_signal(SIGTERM, function($signo){
                if($signo===SIGTERM){
                    // 处理中断信号
                    exit("client child stop!\n");
                }
            });
            // 接受服务器消息
            while(true){
                $inputStr = $this->socketReadAll($socket);
                if($inputStr){
                    echo "$inputStr";
                }
                usleep(100000);
            }
        }
        socket_close($socket);
    }

    public function socketReadAll($socket){
        $inputStr=NULL;
        $bufferSize=128;
        $inputChar = socket_read($socket,$bufferSize);
        while(strlen($inputChar)>0){
            $inputStr.=$inputChar;
            $inputChar = socket_read($socket,$bufferSize);
        }
        return $inputStr;
    }

}

$wc=new WsClient();
echo "please input [ip:port] : ";
$in=fgets(STDIN);
echo "Client Start: ( input \":q\" to quit ) \n";
$in=explode(':',$in);
$wc->start($in[0],$in[1]);