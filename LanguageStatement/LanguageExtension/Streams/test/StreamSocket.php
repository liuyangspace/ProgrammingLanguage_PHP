<?php
/**
 *
 */

namespace LanguageStatement\LanguageExtension\Streams\test;

// service
$start='service';
$start='client';
if($start==='service'){
    $socket = stream_socket_server("tcp://127.0.0.1:8000", $errno, $errstr);
    if (!$socket) {
        echo "$errstr ($errno)<br />\n";
    } else {
        while ($conn = stream_socket_accept($socket)) {
            fwrite($conn, 'The local time is ' . date('n/j/Y g:i a') . "\n");
            echo fread($conn,1024)."\n";
            fclose($conn);
        }
        fclose($socket);
    }
}

// client
if($start==='client'){
    $client=stream_socket_client('tcp://127.0.0.1:8000',$errno, $errstr);
    if (!$client) {
        echo "ERROR: $errno - $errstr<br />\n";
    } else {
        //stream_socket_enable_crypto($client, true, STREAM_CRYPTO_METHOD_SSLv23_CLIENT);
        fwrite($client, "123\n");
        //stream_socket_enable_crypto($client, false);
        echo fread($client, 1024)."\n";
        echo stream_socket_get_name($client,true)."\n";
        fclose($client);
    }
}

