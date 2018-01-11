<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of SingletonTest
 *
 * @author wassime
 */
use DesignPatterns\Creation\Singleton\Singleton;
class SingletonTest extends \PHPUnit\Framework\TestCase{
    public function testsingle_instance() {
        $o1= Singleton::getObject();
        $o2= Singleton::getObject();
        $this->assertEquals($o2, $o1);
    }
     public function testfild() {
        $o1= Singleton::getObject();
        $o2= Singleton::getObject();
        $o1->setName("awa");
        
        $this->assertEquals("awa", $o2->getName());
    }
    
    
}
