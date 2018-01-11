<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of StrategyTest
 *
 * @author wassime
 */
use DesignPatterns\Comportement\Strategy\Strategy;

class Format_I implements DesignPatterns\Comportement\Strategy\IStyle{
    
    
    public function textFormat($txt): string {
        return "<i> $txt </i>";
        
    }

}
class StrategyTest extends \PHPUnit\Framework\TestCase{
    
    public function testStrategy() {
        $str="test text";
           $strategy=new Strategy($str);
           
           $strategy->setFormat(new Format_I());/// set strategy
           
     $stri= $strategy->affiche();
     
           $this->assertEquals($stri, "<i> $str </i> <br>");
           
    $strategy->setFormat(new \DesignPatterns\Comportement\Strategy\Format_h1());/// set strategy
         $strh1= $strategy->affiche();
     
           $this->assertEquals($strh1, "<h1>  $str Strategy H1 </h1>  <br>");  
        
    }
}
