<?php

/*
 L'ajout (et la suppression) des responsabilités à un 
  <------objet------>
  dynamiquement au moment de l'exécution.
 */

namespace DesignPatterns\Structure\decorator;

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
