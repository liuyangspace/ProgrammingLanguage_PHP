<?php
/**
 * 堆
 * (SplHeap 参见 LanguageExtension/SPL/DataStructure/SplHeap)
 *
 * 最大堆，最小堆
 * Reference:
 * SPL:
 * @see \SplHeap
 * @see \LanguageStatement\LanguageExtension\SPL\DataStructure\SplHeap
 */

namespace LanguageStatement\DataType;


class Heap extends \SplHeap
{

    /**
     * @param mixed $value1
     * @param mixed $value2
     * @return int
     */
    public function compare($value1, $value2)
    {
        if($value1>$value2){
            return 1;
        }elseif($value1===$value2){
            return 0;
        }else{
            return -1;
        }
    }

}