<?php

/*
Convertir l'interface d'une classe dans une autre interface
comprise par la partie cliente.
◦ Permettre à des classes de fonctionner ensemble, ce qui
n'aurait pas été possible à cause de leurs interfaces
incompatibles.

 */

namespace DesignPatterns\Structure\Adapter;

/**
 * Description of Adapter_heritage
 *
 * @author wassime
 */
class Adapter_heritage extends AutreClass implements InterfaceMath {
    //put your code here
    public function somme2(int $a, int $b): int {
        return $this->add($a,$b);  
    }

    public function somme3(int $a, int $b, int $c): int {
        return $this->add($a,$b,$c); 
    }

}
