<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/12/24
 * Time: 11:07
 */

namespace LanguageStatement\LanguageExtension\PredefinedInterface\Exception;


class Exception extends \Exception
{
    /**
     *  属性
     *  protected string $message ;
     *  protected int $code ;
     *  protected string $file ;
     *  protected int $line ;
     */

    public function __construct($message, $code, Exception $previous){parent::__construct($message, $code, $previous);}
    public function __toString(){parent::__toString();}
    /**
     * 方法
     * final public string getMessage ( void )
     * final public Exception getPrevious ( void )
     * final public int getCode ( void )
     * final public string getFile ( void )
     * final public int getLine ( void )
     * final public array getTrace ( void )
     * final public string getTraceAsString ( void )
     * final private void __clone ( void )
     */
}