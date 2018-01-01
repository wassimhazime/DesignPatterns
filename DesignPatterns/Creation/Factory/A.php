<?php
namespace DesignPatterns\Creation\Factory;
/*
 * test class
 */

/**
 * Description of A
 *
 * @author Wassim Hazime
 */
class A {
    private $name;
    private $age;
    function __construct(string $name, string $age) {
        $this->name = $name;
        $this->age = $age;
        
    }
    function afiche(){
        echo 'object A<br>';
    }

}
