<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of PrototypeTest
 *
 * @author wassime
 */
class PrototypeTest extends \PHPUnit\Framework\TestCase{
    public function testclone() {
        $classeTs1=new DesignPatterns\Creation\Prototype\Classe("TS1", "wassim", 15);
        $eleve1=new DesignPatterns\Creation\Prototype\PrototypeApp($classeTs1, "achraf", "hazime", 28, "casa");
       
        $eleve2= clone $eleve1;
        $eleve3=  $eleve1->copier();
      
           
           
         $this->assertEquals(TRUE,$eleve1==$eleve2,"eleve2");
         $this->assertEquals(TRUE,$eleve1== $eleve3,"eleve3");
         $this->assertEquals(TRUE,$eleve3== $eleve2);
        
        
         $this->assertEquals(FALSE,$eleve1=== $eleve2);
         $this->assertEquals(FALSE,$eleve1=== $eleve3);
         $this->assertEquals(FALSE,$eleve3=== $eleve2);
         
         
         $eleve2->setNom("nabil");
         $eleve3->setNom("tarik");
         
         $this->assertEquals("achraf",$eleve1->getNom(),"eleve1");
         $this->assertEquals("nabil",$eleve2->getNom(),"eleve2");
         $this->assertEquals("tarik",$eleve3->getNom(),"eleve3");
        
    }
  
}
