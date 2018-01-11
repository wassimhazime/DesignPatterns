<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Factory
 *
 * @author wassime
 */
use DesignPatterns\Creation\Factory\Factory;
class FactoryTest extends \PHPUnit\Framework\TestCase{
    
      public function testFactory() {
       $A= Factory::get("A") ;
       $B= Factory::get("B");
       
       $this->assertEquals($A instanceof \DesignPatterns\Creation\Factory\A , TRUE);
       $this->assertEquals($B instanceof \DesignPatterns\Creation\Factory\B , TRUE);
       
    }
    
    
    public function testFactory_objectA() {
       $A= Factory::get("A") ;
       $a= Factory::get("a");
       $geta= Factory::getA();
       $this->assertEquals($geta, $a);
       $this->assertEquals($A, $a);
    }
    
    
    
    
}
