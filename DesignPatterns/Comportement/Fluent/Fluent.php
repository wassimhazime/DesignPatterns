<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace DesignPatterns\Comportement\Fluent;

/**
 * Description of Fluent
 *
 * @author Wassim Hazime
 * Pour mieux comprendre de quoi il s'agit je vous propose un petit exemple simple
 *  : un QueryBuilder. Le but est ensuite de pouvoir générer des requêtes simplement
 */
class Fluent {
    private $select=["*"];
    private $from=[];
    private $conditions=["1"];
    function __construct() {
        
    }
    function select(){
        $this->select=  func_get_args();
         return $this;
    }

    public function from($table, $alias = null){
        if(is_null($alias)){
            $this->from[] = $table;
        }else{
            $this->from[] = "$table AS $alias";
        }
        return $this;
    }
    public function where(){
        if($this->conditions==["1"]){ $this->conditions=[];}
        foreach(func_get_args() as $arg){
            $this->conditions[] = $arg;
        }
    return $this;}
    
    function query(){
        return 'SELECT '. implode(', ', $this->select)
            . ' FROM ' . implode(', ', $this->from)
            . ' WHERE ' . implode(' AND ', $this->conditions);

      
    }
    public function __toString() {
        return $this->query();
    }
}
