<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of BuilderTest
 *
 * @author wassime
 */

use DesignPatterns\Creation\Builder\ProduitPC;
use DesignPatterns\Creation\Builder\BuilderPC_SONY;
use DesignPatterns\Creation\Builder\BuilderPCintel;

class BuilderTest extends PHPUnit\Framework\TestCase{
    function testsimpleProduit() {
        $cpu="amd";
        $ram="4gb";
        $disque_dur="1T";
        $ecran="15poce";
        $carte_mere="nvidia";
        
        $produit=new ProduitPC($cpu, $ram, $disque_dur, $ecran, $carte_mere);
        
        $this->assertEquals(true, $produit instanceof ProduitPC);
    }
    
    
     function testBuilderintel() {
         $cpu="intell i7";
         $produit=(new BuilderPCintel())->setCpu($cpu)->builde();
          $this->assertEquals(true, $produit instanceof ProduitPC);
         $this->assertEquals($cpu, $produit->getCpu());
    }
    
      
     function testBuildersony() {
         $cpu="intell i7";
         $buildesony=new BuilderPC_SONY();
         $produit=$buildesony->setCpu($cpu)->setDisque_dur("sony 5TB")->builde();
          $this->assertEquals(true, $produit instanceof ProduitPC);
           $this->assertEquals($cpu, $produit->getCpu());
    }
}
