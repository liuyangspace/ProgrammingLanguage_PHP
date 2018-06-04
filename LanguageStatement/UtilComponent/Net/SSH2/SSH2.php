<?php
/**
 * SSH2
 * Bindings to the » libssh2 library which provide access to resources (shell, remote exec, tunneling,
 * file transfer) on a remote machine using a secure cryptographic transport.
 */

namespace LanguageStatement\UtilComponent\SSH2;


class SSH2
{
    public static $config=[
    ];

    // connect
    public static function ssh2_connect($host,$port=22,array $methods,array $callbacks){return ssh2_connect($host,$port,$methods,$callbacks);}//Connect to an SSH server
    public static function ssh2_fingerprint($session,$flags=SSH2_FINGERPRINT_MD5|SSH2_FINGERPRINT_HEX){return ssh2_fingerprint($session,$flags);}//Retrieve fingerprint of remote server
    //
    public static function ssh2_methods_negotiated($session){return ssh2_methods_negotiated($session);}//Return list of negotiated methods
    // Authenticate
    public static function ssh2_auth_none($session,$username){return ssh2_auth_none($session,$username);}//Authenticate as "none"
    public static function ssh2_auth_password($session,$username,$password){return ssh2_auth_password($session,$username,$password);}//Authenticate over SSH using a plain password
    public static function ssh2_auth_pubkey_file($session,$username,$pubkeyfile,$privkeyfile,$passphrase){return ssh2_auth_pubkey_file($session,$username,$pubkeyfile,$privkeyfile,$passphrase);}//Authenticate using a public key
    public static function ssh2_auth_agent($session,$username){return ssh2_auth_agent($session,$username);}//Authenticate over SSH using the ssh agent
    public static function ssh2_auth_hostbased_file($session,$username,$hostname,$pubkeyfile,$privkeyfile,$passphrase=null,$local_username=null){return ssh2_auth_hostbased_file($session,$username,$hostname,$pubkeyfile,$privkeyfile,$passphrase,$local_username);}//Authenticate over SSH using the ssh agent
    // Publickey subsystem
    public static function ssh2_publickey_init($session){return ssh2_publickey_init($session);}//Initialize Publickey subsystem
    public static function ssh2_publickey_add($pkey,$algoname,$blob,$overwrite=false,array $attributes){return ssh2_publickey_add($pkey,$algoname,$blob,$overwrite,$attributes);}//Add an authorized publickey
    public static function ssh2_publickey_list($pkey){return ssh2_publickey_list($pkey);}//List currently authorized publickeys
    public static function ssh2_publickey_remove($pkey,$algoname,$blob){return ssh2_publickey_remove($pkey,$algoname,$blob);}//Remove an authorized publickey
    //
    public static function ssh2_exec($session,$command,$pty=null,Array $env=[],$width=80,$height=25,$width_height_type=SSH2_TERM_UNIT_CHARS){return ssh2_exec($session,$command,$pty,$env,$width,$height,$width_height_type);}//Execute a command on a remote server
    public static function ssh2_shell($session,$term_type="vanilla",Array $env,$width=80,$height=25,$width_height_type=SSH2_TERM_UNIT_CHARS){return ssh2_shell($session,$term_type,$env,$width,$height,$width_height_type);}//Request an interactive shell
    public static function ssh2_fetch_stream($channel,$streamid){return ssh2_fetch_stream($channel,$streamid);}//Fetch an extended data stream
    // file
    public static function ssh2_scp_recv($session,$remote_file,$local_file){return ssh2_scp_recv($session,$remote_file,$local_file);}//Request a file via SCP
    public static function ssh2_scp_send($session,$local_file,$remote_file,$create_mode=0644){return ssh2_scp_send($session,$local_file,$remote_file,$create_mode);}//Send a file via SCP
    // SFTP subsystem
    public static function ssh2_sftp($session){return ssh2_sftp($session);}// Initialize SFTP subsystem
    public static function ssh2_sftp_stat($sftp,$path){return ssh2_sftp_stat($sftp,$path);}//Stat a file on a remote filesystem
    public static function ssh2_sftp_chmod($sftp,$filename,$mode){return ssh2_sftp_chmod($sftp,$filename,$mode);}//Changes file mode
    public static function ssh2_sftp_lstat($sftp,$path){return ssh2_sftp_lstat($sftp,$path);}//Stat a symbolic link
    public static function ssh2_sftp_mkdir($sftp,$dirname,$mode=0777,$recursive=false){return ssh2_sftp_mkdir($sftp,$dirname,$mode,$recursive);}//Create a directory
    public static function ssh2_sftp_readlink($sftp,$link){return ssh2_sftp_readlink($sftp,$link);}//Return the target of a symbolic link
    public static function ssh2_sftp_realpath($sftp,$filename){return ssh2_sftp_realpath($sftp,$filename);}//Resolve the realpath of a provided path string
    public static function ssh2_sftp_rename($sftp,$from,$to){return ssh2_sftp_rename($sftp,$from,$to);}//Rename a remote file
    public static function ssh2_sftp_rmdir($sftp,$dirname){return ssh2_sftp_rmdir($sftp,$dirname);}//Remove a directory
    public static function ssh2_sftp_symlink($sftp,$target,$link){return ssh2_sftp_symlink($sftp,$target,$link);}//Create a symlink
    public static function ssh2_sftp_unlink($sftp,$filename){return ssh2_sftp_unlink($sftp,$filename);}//Delete a file
    //
    public static function ssh2_tunnel($session,$host,$port){return ssh2_tunnel($session,$host,$port);}//Open a tunnel through a remote server
}