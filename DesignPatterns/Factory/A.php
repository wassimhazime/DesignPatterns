<?php
namespace DesignPatterns\Factory;
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
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
