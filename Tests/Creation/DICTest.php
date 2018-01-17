<?php

/*
  Aujourd'hui nous allons parler d'un pattern assez particulier :
 *  Le conteneur d'injecteur de dépendance.
 *  Le but de ce pattern et d'être capable de résoudre les dépendances d'un objet simplement.

  Le problème
  Afin d'avoir un code bien organisé et testable,
 *  on utilise l'injection de dépendance mais
 *  cette méthodologie peut parfois rendre les objets difficiles à instancier.
 */

/**
 * Description of DICTest
 *
 * @author wassime
 */
use DesignPatterns\Creation\Container\DIC;

class A {

    public function affiche($param) {
        return $param;
    }

}

class B {

    private $a;

    function __construct(A $a) {
        $this->a = $a;
    }

    public function afficheparB($param) {
        return $this->a->affiche($param);
    }

}

class DICTest extends PHPUnit\Framework\TestCase {

    public function testsimple() {
        $a = new A();
        $b = new B($a);
        $this->assertEquals("ok", $a->affiche("ok"));
        $this->assertEquals("ok", $b->afficheparB("ok"));
    }

    public function testbuildContainer() {
        $dic = DIC::buildContainer(true);
        $this->assertEquals(true, $dic instanceof DIC);
    }

    public function testbuildContainerIsSinglton() {
        $dic = DIC::buildContainer();
        $dic2 = DIC::buildContainer();
        $this->assertEquals(true, $dic === $dic2); //test
    }

    public function testSimpleGetSetDIS() {
        $dic = DIC::buildContainer();
        $a = new A();

        $dic->set(A::class, $a);
        $a_dic = $dic->get(A::class);

        $this->assertEquals(true, $a_dic === $a);
    }

    public function testGetSetDIS() {
        $dic = DIC::buildContainer();


    

        $a_dic = $dic->get(A::class);

        $this->assertEquals(true, $a_dic instanceof A);
    }

    public function testGetAutoDIS() {
        $dic = DIC::buildContainer();
        $a_dic = $dic->get(A::class);

        $this->assertEquals(true, $a_dic instanceof A);
    }

    /**
     * @expectedException     \Exception
     */
    public function testGetnotClassDIS() {
        $dic = DIC::buildContainer();
        $a_dic = $dic->get("notIsClass");
    }

    public function testSetCallable() {
        $dic = DIC::buildContainer();
        $next=false;

        $dic->set("b", function ($dic) use(&$next){
            $next=true;
            $a=$dic->get(A::class);
            return new B($a);
        });

        
        $this->assertEquals(false, $next);
        $this->assertEquals(true, $dic->get("b") instanceof B);
        $this->assertEquals(true, $next);
        
        
    }

      public function testAutoDepan() {
        $dic = DIC::buildContainer();
         $this->assertEquals(true, $dic->get(B::class) instanceof B);
     }
    
      public function testAutoDepanFuncion() {
        $dic = DIC::buildContainer();
        $b=$dic->get(B::class);
          $this->assertEquals("ok", $b->afficheparB("ok"));
     }
     
      /**
     * @expectedException     \Exception
     */
       public function testAutoDepanInterface() {
        $dic = DIC::buildContainer();
        
        $dic->get( \DesignPatterns\Structure\Adapter\TVA::class) ;
                
       }
       
       public function testAutoDepanInterfacecallable() {
        $dic = DIC::buildContainer();
        
        $dic->set( \DesignPatterns\Structure\Adapter\TVA::class, function ($dic)
                {
                      $adap=$dic->get(\DesignPatterns\Structure\Adapter\Adapter_heritage::class);
            
            return new \DesignPatterns\Structure\Adapter\TVA($adap);
        }) ;
        
          $tva=$dic->get( \DesignPatterns\Structure\Adapter\TVA::class)   ;  
          
          $this->assertEquals(true, $tva instanceof \DesignPatterns\Structure\Adapter\TVA);
       }
       
        public function testgetNew() {
        $dic = DIC::buildContainer();
        
        $dic->set( \DesignPatterns\Structure\Adapter\TVA::class, function ($dic)
                {
                      $adap=$dic->get(\DesignPatterns\Structure\Adapter\Adapter_heritage::class);
            
            return new \DesignPatterns\Structure\Adapter\TVA($adap);
        }) ;
        
          $tva=$dic->getNew( \DesignPatterns\Structure\Adapter\TVA::class)   ; 
         $this->assertEquals(true, $tva instanceof \DesignPatterns\Structure\Adapter\TVA);
          
           $tva1=$dic->getNew( \DesignPatterns\Structure\Adapter\TVA::class)   ;  
           $tva2=$dic->getNew( \DesignPatterns\Structure\Adapter\TVA::class)   ; 
          $this->assertEquals(FALSE, $tva1===$tva2);
          
           $tva1=$dic->get( \DesignPatterns\Structure\Adapter\TVA::class)   ;  
           $tva2=$dic->get( \DesignPatterns\Structure\Adapter\TVA::class)   ; 
          $this->assertEquals(true, $tva1===$tva2);
          
          $b1=$dic->get(B::class);
          $b2=$dic->get(B::class);
           $this->assertEquals(true, $b1===$b2);
           
           $b1=$dic->getNew(B::class);
           $b2=$dic->getNew(B::class);
           $this->assertEquals(false, $b1===$b2);
          
       }
       
       
}
