<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/12/12
 * Time: 15:32
 */

namespace LanguageStatement\DataType;


class Time
{
    //月份的英文
    public  $monthNames = array(
        "en" => array(
            "full" => array(1=>'January','February','March','April','May',
                'June','July','August','September','October','November','December'),

            "short" => array(1=>'Jan','Feb','Mar','Apr','May','Jun',
                'Jul','Aug','Sep','Oct','Nov','Dec')
        ),
        "es" => array(
            "full" => array(1=>'Enero','Febrero','Marzo','Abril','Mayo',
                'Junio','Julio','Agosto','Septiembre','Octubre','Noviembre','Deciembre'),

            "short" => array(1=>'Ene','Feb','Mar','Abr','May','Jun',
                'Jul','Ago','Sep','Oct','Nov','Dec')
        ),
    );

}