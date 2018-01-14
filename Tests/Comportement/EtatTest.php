<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of EtatTest
 *
 * @author wassime
 */
class EtatTest extends \PHPUnit\Framework\TestCase{
    public function testEtatNormal() {
         $text=new \DesignPatterns\Comportement\Stat_Etat\Ouvrer(" e1 =>");
        $txt=$text->modifie(" e2 =>")->sauvegarde(" e3 =>")->ferme(" e4 =>")->fin();
        echo $txt;
        $this->assertEquals(' e1 =>|ouvre e2 =>|modifier  e3 =>|sauvgarde e4 =>|ferme ',$txt);
    }
    
    /**
     * @expectedException     Exception
     */
     public function testException() {
         $text=new \DesignPatterns\Comportement\Stat_Etat\Ouvrer(" e1 =>");
         $txt=$text->modifie(" e2 =>")->ouvrer(" e3 =>");
        
    }
        /**
     * @expectedException     Exception
     */
     public function test2Exception() {
         $text=new \DesignPatterns\Comportement\Stat_Etat\Ouvrer(" e1 =>");
         $txt=$text->modifie(" e2 =>")->ouvrer(" e3 =>")->fermr()->fin();
        
    }
}
