<?php
/**
*
*/

namespace LanguageStatement\UtilComponent\DataType;


trait File
{
    /**
     * traversalFile 深度优先遍历目录下的文档
     * @param $path
     * @param callable $handle
     * @throws \Exception
     */
    public function traversalFile($path,callable $handle){
        if(is_file($path)){
            $handle($path);
        }elseif(is_dir($path)){
            $dirResource=dir($path);
            while($fileName=$dirResource->read()){
                if($fileName=='.' || $fileName=='..'){
                    continue;
                }
                #traversalFile($path.DIRECTORY_SEPARATOR.$fileName,$handle);
                $this->traversalFile($path.DIRECTORY_SEPARATOR.$fileName,$handle);
            }
            $dirResource->close();
        }else{
            throw new \Exception('File or Dir not exists !');
        }
    }
}