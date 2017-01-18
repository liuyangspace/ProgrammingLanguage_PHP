<?php
/**
 * hash usage
 */
$str='This is a test!';
//
var_dump(hash('sha256',$str,true));
//
var_dump(hash_hmac('sha256',$str,true));
//
var_dump(hash_file('sha256','Hash.php',true));
//
var_dump(hash_algos());
//
