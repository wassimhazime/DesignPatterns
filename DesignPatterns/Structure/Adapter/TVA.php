<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace DesignPatterns\Structure\Adapter;

/**
 * Description of TVA
 *
 * @author wassime
 */
class TVA {
    private $math;

    function __construct(InterfaceMath $math) {
        $this->math = $math;
    }

    public function TVA2($a,$b) :int{
        return $this->math->somme2($a, $b);
    }
    public function TVA3($a,$b,$c):int {
        return $this->math->somme3($a, $b, $c);
    }
 
}
