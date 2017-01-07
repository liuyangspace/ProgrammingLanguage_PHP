<?php
/**
 * PHP 命令行
 */

namespace LanguageStatement\LanguageExtension;


class Cli
{
    public static $command=[
        'php -i',//PHP information
        'php --ini',//PHP ini information
        'php -v',//Version information
        'php -m',// Show compiled in modules
        'php -a',// Run interactively
        'php -r <code> [--] [args...]',//Run PHP <code> without using script tags '<?'
        'php -S <host>:<port>  [-t docroot]',//在当前目录启动PHP内置Web服务器,-t  document root <docroot>
        'php [-f] <file> [--] [args...]',//Parse and execute <file>.
        'php [-B <begin_code>] [-R <code>|-F <file>] [-E <end_code>] [--] [args...]',//
        //
        'php -d foo[=bar]',//Define INI entry foo with value 'bar,设置ini配置
        'php -e',//Generate extended information for debugger/profiler
        'php -n',//No php.ini file will be used
        'php -l',//Syntax check only (lint)
        'php -H',//Hide any passed arguments from external tools.
        'php -s',//Output HTML syntax highlighted source.
        'php -w',// Output source with stripped comments and whitespace.
        'php -z <file>',//Load Zend extension <file>.
        'php -c <path>|<file>',// Look for php.ini file in this directory
        'php -h',// php command help
    ];

    protected static $config=[
        'cli_server.color',//内置Web Server的终端输出有无颜色。
    ];
    //cli 命令行
    public static function cli_get_process_title(){return cli_get_process_title();}//Returns the current process title,available only in CLI mode.
    public static function cli_set_process_title($title){return cli_set_process_title($title);}//Sets the process title visible in tools such as top and ps. This public static function is available only in CLI mode.
    public static function getopt($options,$longopts){return getopt($options,$longopts);}//从命令行参数列表中获取选项

}