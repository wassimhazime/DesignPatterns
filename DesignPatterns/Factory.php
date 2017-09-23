<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace DesignPatterns;
use DesignPatterns\Factory\A;
use DesignPatterns\Factory\B;
/**
 * Description of Factory
 *
 * @author Wassim Hazime
 */
class Factory {
    
    public static function getA($name="name",$age=5){
        return new A($name, $age) ;  
    }
    
    public static function getB($name="name",$age=5,$adress=""){
       return new B(self::getA($name,$age), $adress)  ;
    }
}
