<?php

/*
 Convertir l'interface d'une classe dans une autre interface
comprise par la partie cliente.
◦ Permettre à des classes de fonctionner ensemble, ce qui
n'aurait pas été possible à cause de leurs interfaces
incompatibles.

 */

/**
 * Description of AdapterTest
 *
 * @author wassime
 */
use DesignPatterns\Structure\Adapter\SimpleClass;
use DesignPatterns\Structure\Adapter\TVA;
class AdapterTest extends PHPUnit\Framework\TestCase{
      public function testTVA() {
         
         $tva=new TVA(new SimpleClass());
         
         $this->assertEquals($tva->TVA2(3, 3), 6);
        $this->assertEquals($tva->TVA3(3, 3,0), 6);
         }
    
    public function testAdapter_heritage() {
       
         $tva=new TVA(new \DesignPatterns\Structure\Adapter\Adapter_heritage());
         
         $this->assertEquals($tva->TVA2(3, 3), 6);
        $this->assertEquals($tva->TVA3(3, 3,0), 6);
         }
         
         public function testAdapter_composition() {
        
         $tva=new TVA(new \DesignPatterns\Structure\Adapter\Adapter_composition());
         
         $this->assertEquals($tva->TVA2(3, 3), 6);
        $this->assertEquals($tva->TVA3(3, 3,0), 6);
         }
}
