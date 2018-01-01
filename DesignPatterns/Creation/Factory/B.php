<?php
namespace DesignPatterns\Creation\Factory;
/*
 * test class dépendances class A


 */

/**
 * Description of B
 *
 * @author Wassim Hazime
 */

class B {
    private $A;
    private $adress;
    function __construct(A $A, string $adress) {
        $this->A = $A;
        $this->adress = $adress;
        
    }
    function afiche(){
        echo 'object B<br>' .$this->A->afiche();
    }

}
