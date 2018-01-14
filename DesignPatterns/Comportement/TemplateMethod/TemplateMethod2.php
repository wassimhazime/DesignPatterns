<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace DesignPatterns\Comportement\TemplateMethod;

/**
 * Description of TemplateMethod1
 *
 * @author wassime
 */
class TemplateMethod2 extends AbstractTemplateMethod {
   
    public function method1(): int {
        return 2;
        
    }

    public function method2(): int {
        return 2;
    }

}
