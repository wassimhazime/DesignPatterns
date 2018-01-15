<?php

/*
 * Le pattern Etat permet de déléguer le comportement
d'un objet dans un autre objet. Cela permet de changer
le comportement de l'objet en cours d'exécution et de
simuler un changement de classe.
.
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
