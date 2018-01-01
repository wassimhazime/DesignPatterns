<?php

/*
 * Le principe est d'avoir une classe qui va 
 * se charger de créer les objets dont on a besoin.
 */

namespace DesignPatterns\Creation\Factory;

/**
 * Description of Factory
 *
 * @author Wassim Hazime
 */
class Factory {
    
    public static function getA(string $name="name",int $age=5){
        return new A($name, $age) ;  
    }
    
    public static function getB(string $name="name",int $age=5,string $adress=""){
       return new B(self::getA($name,$age), $adress)  ;
    }
}
