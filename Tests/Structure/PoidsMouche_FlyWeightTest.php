<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of PoidsMouche_FlyWeight
 *
 * @author wassime
 */
use DesignPatterns\Structure\PoidsMouche_FlyWeight\Factory_PoidsMouche;
class PoidsMouche_FlyWeightTest extends PHPUnit\Framework\TestCase{
    
    public function testObjectPartage() {
        $factory=new Factory_PoidsMouche();
        $a=$factory->getPoidsMouchePartage("awa");
        $b=$factory->getPoidsMouchePartage("awa");
        $wassim=$factory->getPoidsMouchePartage("wassim");
        $this->assertEquals($b, $a);
        $this->assertEquals($b->afficheNom(), $a->afficheNom());
        $this->assertEquals($wassim->afficheNom(), "wassim");
        
    }
   public function testObjectNomPartage() {
        $factory=new Factory_PoidsMouche();
        $a=$factory->getPoidsMoucheNomPartage("awa", 12);
        $b=$factory->getPoidsMoucheNomPartage("awa", 12);
          
          $this->assertEquals($a->age, $b->age);
          $this->assertEquals($a->nom, $b->nom);
          $this->assertEquals($a!==$b, true);
          $this->assertEquals($a==$b, true);
    }
}
