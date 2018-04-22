<?php

/**
 * 服务端
 * 基于 posix,pcntl,sockets 的简易聊天室
 */
class WsServer
{
    public $clientSocketPool=[];
    public $hostSocket;
    public $clientKey=1000;
    const SESSION_END=':q'.PHP_EOL;

    public function serverStart($ip,$port)
    {
        $host_socket = socket_create(AF_INET, SOCK_STREAM, SOL_TCP);
        if(!$host_socket) die("Failed to start event server. socket_create: ". socket_strerror(socket_last_error())."\n");

        if(! socket_set_option($host_socket, SOL_SOCKET, SO_REUSEADDR, 1) )
            die("Failed to start event server. socket_set_option: ". socket_strerror(socket_last_error())."\n");
        socket_set_option($host_socket, SOL_SOCKET, SO_REUSEADDR, 1);
        if(! socket_bind($host_socket,$ip,(integer)$port) )
            die("Failed to start event server. socket_bind: ". socket_strerror(socket_last_error())."\n");

        if(! socket_listen($host_socket,10) )
            die("Failed to start event server. socket_listen: ".socket_strerror(socket_last_error())."\n");

        socket_set_nonblock($host_socket);

        $this->hostSocket=$host_socket;
        $write=[];

        //产生子进程分支
        $pid = pcntl_fork();
        if ($pid == -1) {
            exit("could not fork"); //pcntl_fork返回-1标明创建子进程失败
        } else if ($pid) {
            // 父进程;
            while(true){
                $in=fgets(STDIN);
                $this->clientBroadcast('[Server]: '.$in);
                if($in==self::SESSION_END){//会话结束
                    $this->closeServer();
                    if(posix_kill($pid,SIGTERM)) exit("server parent end!\n");
                }
            }
        } else {
            // 子进程
            // 安装信号量
            pcntl_signal(SIGTERM, function($signo){
                if($signo===SIGTERM){
                    // 处理中断信号
                    exit("server child stop!\n");
                }
            });
            // 轮训客户端
            while (true) {
                $readFds = array_merge($this->clientSocketPool,[$this->hostSocket]);
                $ready = socket_select($readFds, $write, $except = NULL, 0);
                if( $ready > 0 ){ // var_dump($ready);
                    //
                    $newClientSocket=socket_accept($this->hostSocket);
                    if(is_resource($newClientSocket)){
                        socket_set_nonblock($newClientSocket);
                        $this->clientSocketPool[$this->clientKey]=$newClientSocket;
                        echo $serverMessage="[$this->clientKey]: [Session In]\n";
                        $this->clientBroadcast($serverMessage);
                        $this->clientKey++;
                    }
                    //
                    foreach($this->clientSocketPool as $key=>$readSocket){
                        $inputStr=$this->socketReadAll($readSocket);
                        if($inputStr){
                            //
                            if($inputStr===self::SESSION_END){
                                $inputStr='[Session Out]';
                                socket_close($this->clientSocketPool[$key]);
                                unset($this->clientSocketPool[$key]);
                            }
                            echo $serverMessage="[$key]: $inputStr";
                            //
                            $this->clientBroadcast($serverMessage);
                        }
                    }
                    //
                }
                usleep(100);
            }
        }
    }

    // 客户端广播
    public function clientBroadcast($inputStr,$except=null)
    {
        foreach($this->clientSocketPool as $writeSocket){
            if($writeSocket!=$except){
                socket_write($writeSocket, $inputStr,strlen($inputStr));
            }
        }
    }

    //
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

    //
    public function closeServer()
    {
        socket_close($this->hostSocket);
        unset($this->clientSocketPool);
    }
}
error_reporting(E_ERROR | E_WARNING | E_PARSE);
$ws=new WsServer();
echo "please input [ip:port] : ";
$in=fgets(STDIN);
echo "Server Start: ( input \":q\" to quit ) \n";
$in=explode(':',$in);
$ws->serverStart($in[0],$in[1]);
//echo "input \":q\" to quit !\n";