<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace DesignPatterns\decorator;

/**
 * Description of DecoratorWhere
 *
 * @author Wassim Hazime
 */
class DecoratorWhere implements InterfaceApp{
    public $sql;
    function __construct(InterfaceApp $s) {
        $this->sql=$s;  
    }

    

    
    public function select($table,$id=1) {
        return $this->sql->select($table)." where id=$id"; 
    }
    public function affiche($table,$id=1){
        echo $this->select($table,$id);
    }
}
