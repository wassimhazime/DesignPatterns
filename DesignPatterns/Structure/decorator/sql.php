<?php

/*
 L'ajout (et la suppression) des responsabilités à un 
  <------objet------>
  dynamiquement au moment de l'exécution.
 */

/**
 * Description of main
 *
 * @author Wassim Hazime
 */
namespace DesignPatterns\Structure\decorator;
class sql implements InterfaceApp{


    

    public function select($table) {
        return "select * from $table";
    }

}
