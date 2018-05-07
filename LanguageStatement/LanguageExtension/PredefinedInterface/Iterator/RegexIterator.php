<?php
/**
 * RegexIterator
 * This iterator can be used to filter another iterator based on a regular expression.
 */

namespace LanguageStatement\LanguageExtension\PredefinedInterface\Iterator;


class RegexIterator extends \RegexIterator // extends \FilterIterator
{
    /* 常量 */
    const MATCH         = 0 ; // Only execute match (filter) for the current entry (see preg_match()).
    const GET_MATCH     = 1 ; // Return the first match for the current entry (see preg_match()).
    const ALL_MATCHES   = 2 ; // Return all matches for the current entry (see preg_match_all()).
    const SPLIT         = 3 ; // Returns the split values for the current entry (see preg_split()).
    const REPLACE       = 4 ; // Replace the current entry (see preg_replace(); Not fully implemented yet)
    const USE_KEY       = 1 ; // Match the entry key instead of the entry value.

    public function __construct(\Iterator $iterator,$regex,$mode=self::MATCH,$flags=0,$preg_flags=0){
        parent::__construct($iterator,$regex,$mode,$flags,$preg_flags);//Create a new RegexIterator which filters an Iterator using a regular expression.
    }
    public function accept(){return parent::accept();}//Get accept status
    public function setFlags($flags){parent::setFlags($flags);}//Sets the flags.
    public function getFlags(){return parent::getFlags();}//Get flags
    public function getPregFlags(){return parent::getPregFlags();}//Returns the regular expression flags.
    public function setPregFlags($preg_flags){parent::setPregFlags($preg_flags);}//Sets the regular expression flags.
    public function setMode($mode){parent::setMode($mode);}//Sets the operation mode.
    public function getMode(){return parent::getMode();}//Sets the operation mode.
    public function getRegex(){return parent::getRegex();}//Returns current regular expression

}