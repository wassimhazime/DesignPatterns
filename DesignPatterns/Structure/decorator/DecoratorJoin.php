<?php

/*
 L'ajout (et la suppression) des responsabilités à un 
  <------objet------>
  dynamiquement au moment de l'exécution.
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
