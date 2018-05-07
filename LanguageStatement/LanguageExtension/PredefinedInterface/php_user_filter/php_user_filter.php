<?php
/**
 * user filter
 * 此类多用于被继承，覆盖其中的方法 从而达到 过滤 Stream 的作用
 * 参考 stream_filter_register(),stream_filter_append() 过滤 Stream
 */

namespace LanguageStatement\LanguageExtension\PredefinedInterface\php_user_filter;


class php_user_filter extends \php_user_filter
{

    // 属性
    public $filtername ;
    public $params ;

    public function filter($in, $out, &$consumed, $closing){parent::filter($in, $out, $consumed, $closing);}//This method is called whenever data is read from or written to the attached stream (such as with fread() or fwrite()).
    public function onClose(){parent::onClose();}//Called when closing the filter
    public function onCreate(){parent::onCreate();}//Called when creating the filter

}