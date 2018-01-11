<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of SimpleClass
 *
 * @author wassime
 */
namespace DesignPatterns\Structure\Adapter;

class SimpleClass implements InterfaceMath{
    
    
    public function somme2(int $a, int $b): int {
        return $a+$b;
    }

    public function somme3(int $a, int $b, int $c): int {
        return $a+$b+$c;
    }

}
