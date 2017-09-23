<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace DesignPatterns;
use DesignPatterns\Fluent;

/**
 * Description of Facade
 *
 * @author Wassim Hazime
 */
class Facade {
    
    public static function __callStatic($name, $arguments){
        $query = new Fluent(); 
        return call_user_func_array([$query, $name], $arguments);
    }

}
