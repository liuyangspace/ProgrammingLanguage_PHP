<?php
/**
 * SplSubject
 * The SplSubject interface is used alongside SplObserver to implement the Observer Design Pattern.
 */

namespace LanguageStatement\LanguageExtension\SPL\Observer;


interface SplSubject extends \SplSubject
{
    public function attach(\SplObserver $observer);//Attach an SplObserver
    public function detach(\SplObserver $observer);//Detach an observer
    public function notify();//Notify an observer
}