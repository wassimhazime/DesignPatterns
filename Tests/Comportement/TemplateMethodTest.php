<?php

/*
Les méthodes Template utilisent l’héritage pour faire varier des parties d’un algorithme
Les stratégies utilisent la délégation pour faire varier tout l’algorithme.
 */

/**
 * Description of TemplateMethodTest
 *
 * @author wassime
 */
use DesignPatterns\Comportement\TemplateMethod\TemplateMethod1;
use DesignPatterns\Comportement\TemplateMethod\TemplateMethod2;
use DesignPatterns\Comportement\TemplateMethod\TemplateMethod3;
class TemplateMethodTest extends \PHPUnit\Framework\TestCase{
    
    public function testTemplateMethod() {
       
        $app=new DesignPatterns\Comportement\TemplateMethod\AppTemplateMethod();
        $int1=$app->call(1, new TemplateMethod1);
        $int2=$app->call(1, new TemplateMethod2);
        $int3=$app->call(1, new TemplateMethod3);
        
        $this->assertEquals(3, $int1);
        $this->assertEquals(5, $int2);
        $this->assertEquals(7, $int3);
        
    }
}
