<?php
/**
 * SplObserver
 * The SplObserver interface is used alongside SplSubject to implement the Observer Design Pattern.
 */

namespace LanguageStatement\LanguageExtension\SPL\Observer;


interface SplObserver extends \SplObserver
{
    public function update(\SplSubject $subject);//Receive update from subject
}