<?php
/**
 * PharFileInfo
 * The PharFileInfo class provides a high-level interface to the contents
 * and attributes of a single file within a phar archive.
 */

namespace LanguageStatement\LanguageExtension\Phar;


class PharFileInfo extends \PharFileInfo // extends \SplFileInfo
{

    public function __construct($entry){parent::__construct($entry);}//

    public function chmod($permissions){parent::chmod($permissions);}//Sets file-specific permission bits
    public function compress($compression){return parent::compress($compression);}//Compresses the current Phar entry with either zlib or bzip2 compression

    public function decompress(){return parent::decompress();}//Decompresses the current Phar entry within the phar
    public function delMetadata(){return parent::delMetadata();}//Deletes the metadata of the entry

    public function getCRC32(){return parent::getCRC32();}//Returns CRC32 code or throws an exception if CRC has not been verified

    public function isCRCChecked(){return parent::isCRCChecked();}//Returns whether file entry has had its CRC verified
    public function isCompressed($compression_type=9021976){return parent::isCompressed($compression_type);}//

    /**
     * 方法已经从 phar 扩展 2.0.0以上版本中删除。
     * public bool PharFileInfo::isCompressedBZIP2 ( void ) , Returns whether the entry is compressed using bzip2
     * public bool PharFileInfo::isCompressedGZ ( void ) , Returns whether the entry is compressed using gz
     * public bool PharFileInfo::setCompressedBZIP2 ( void ) , Compresses the current Phar entry within the phar using Bzip2 compression
     * public bool PharFileInfo::setCompressedGZ ( void ) , Compresses the current Phar entry within the phar using gz compression
     * public bool PharFileInfo::setUncompressed ( void ) , Uncompresses the current Phar entry within the phar, if it is compressed
     */

    public function getCompressedSize(){return parent::getCompressedSize();}//Returns the actual size of the file (with compression) inside the Phar archive

    public function getMetadata(){return parent::getMetadata();}//
    public function setMetadata($metadata){parent::setMetadata($metadata);}//Sets file-specific meta-data saved with a file
    public function getPharFlags(){return parent::getPharFlags();}//Returns the Phar file entry flags

    public function hasMetadata(){return parent::getMetadata();}//Returns the metadata of the entry
}