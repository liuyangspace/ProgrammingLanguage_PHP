<?php
/**
 *
 */

namespace LanguageStatement\UtilComponent\Stomp;


// ActiveMQ test

$queue  = '/queue/foo';
$msg    = 'bar';

/* connection */
try {
    $stomp = new \Stomp('tcp://localhost:61613');
} catch(\StompException $e) {
    die('Connection failed: ' . $e->getMessage());
}

/* send a message to the queue 'foo' */
$stomp->send($queue, $msg);

/* subscribe to messages from the queue 'foo' */
$stomp->subscribe($queue);

/* read a frame */
$frame = $stomp->readFrame();

if ($frame->body === $msg) {
    var_dump($frame);

    /* acknowledge that the frame was received */
    $stomp->ack($frame);
}

/* close connection */
unset($stomp);
