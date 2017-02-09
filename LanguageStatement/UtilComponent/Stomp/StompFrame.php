<?php
/**
 * StompFrame
 * Represents a message which was sent or received from a Stomp compliant Message Broker.
 */

namespace LanguageStatement\UtilComponent\Stomp;


class StompFrame extends \StompFrame
{
    /* 属性 */
    public $command ;
    public $headers ;
    public $body ;

    /**
     * StompFrame::__construct ([ string $command [, array $headers [, string $body ]]] )
     */

}