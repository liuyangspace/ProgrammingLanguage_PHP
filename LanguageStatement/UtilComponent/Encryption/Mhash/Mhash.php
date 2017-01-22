<?php
/**
 * Mhash
 *
 */

namespace LanguageStatement\UtilComponent\Encryption\Mhash;


class Mhash
{

    public static function mhash($hash,$data,$key){return mhash($hash,$data,$key);}//Computes hash

    public static function mhash_count(){return mhash_count();}//Gets the highest available hash ID
    public static function mhash_get_hash_name($hash){return mhash_get_hash_name($hash);}//Gets the name of the specified hash
    public static function mhash_get_block_size($hash){return mhash_get_block_size($hash);}//Gets the block size of the specified hash
    public static function mhash_keygen_s2k($hash,$password,$salt,$bytes){return mhash_keygen_s2k($hash,$password,$salt,$bytes);}//Generates a key}

}