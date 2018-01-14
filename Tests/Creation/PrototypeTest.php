<?php

/*
 *L’objectif du pattern PROTOTYPE est de fournir de nouveaux
objets par la copie d’un exemple plutôt que de produire
de nouvelles instances non initialisées d’une classe.
Raisons d’utilisation
◦ Le système doit créer de nouvelles instances, mais il ignore de
quelle classe. Il dispose cependant d'instances de la classe
désirée.
◦ La duplication peut être également intéressante pour les
performances (la duplication est plus rapide que l'instanciation).
Résultat :
◦ Le Design Pattern permet d'isoler l'appartenance à une classe.

 */

/**
 * Description of PrototypeTest
 *
 * @author wassime
 */
class PrototypeTest extends \PHPUnit\Framework\TestCase{
    public function testclone() {
        $classeTs1=new DesignPatterns\Creation\Prototype\Classe("TS1", "wassim", 15);
        $eleve1=new DesignPatterns\Creation\Prototype\Eleve($classeTs1, "achraf", "hazime", 28, "casa");
       
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
