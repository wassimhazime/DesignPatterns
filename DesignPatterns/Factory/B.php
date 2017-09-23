<?php
namespace DesignPatterns\Factory;

class B {
    private $A;
    private $adress;
    function __construct($A, $adress) {
        $this->A = $A;
        $this->adress = $adress;
        
    }
    function afiche(){
        echo 'object B<br>' .$this->A->afiche();
    }

}
