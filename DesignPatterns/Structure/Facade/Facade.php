<?php

/*
 * Comme son nom l'indique le principe des Facade est de créer une classe qui
 *  servira de façade à une autre 
 * classe en rendant la classe appellable via des appels statiques. 
 */

namespace DesignPatterns\Structure\Facade;



/**
 * Description of Facade
 *
 * @author Wassim Hazime
 */
class Facade {
    
    public static $objects=[];
    
    static function setObjects($object) {
        self::$objects[] = $object;
    }

    
    public static function __callStatic($name, $arguments) {
          self::setObjects(new A());
          self::setObjects(new B());

        foreach (self::$objects as $object) {
            $class = new \ReflectionClass($object);
            if ($class->hasMethod($name)) {
                return call_user_func_array([$object, $name], $arguments);
            }
        }
    }

}
