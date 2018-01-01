<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace DesignPatterns\Structure\decorator;

/**
 * Description of DecoratorJoin
 *
 * @author Wassim Hazime
 */
class DecoratorJoin implements InterfaceApp{
    public $sql;
    function __construct(InterfaceApp $sql) {
        $this->sql = $sql;
    }

    
    
    public function select($table) {
        return  $this->sql->select($table)." join categorie on id_categorie=id_$table"; 
    }

}
