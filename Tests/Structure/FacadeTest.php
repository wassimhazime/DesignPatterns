<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of FacadeTest
 *
 * @author wassime
 */
use DesignPatterns\Structure\Facade\Facade;

class FacadeTest extends \PHPUnit\Framework\TestCase {

    public function testFacade() {
        $strA = Facade::aficheA();
        $strB = Facade::aficheB();
        $this->assertEquals("par facade object A <br>", $strA);
        $this->assertEquals("par facade object B<br>", $strB);
    }

    public function test_add_object() {

          $obj = $this->getMockBuilder(stdClass::class)
                ->setMethods(['awa','foo'])
                ->getMock();
          $obj->expects($this->once())
                ->method('awa')
                ->willReturn("test mock function awa");
          $obj->expects($this->once())
                ->method('foo')
                ->willReturn("test mock function foo");
         
         
         
         
         

        Facade::setObjects($obj);
        
        
        $str1 = Facade::awa();
        $this->assertEquals($str1, "test mock function awa");
        
        $str2 = Facade::foo();
        $this->assertEquals($str2, "test mock function foo");
        
        $strB = Facade::aficheB();
        $this->assertEquals("par facade object B<br>", $strB);
        
    }

}
