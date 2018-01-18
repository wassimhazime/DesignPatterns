<?php

/*
 L'ajout (et la suppression) des responsabilités à un 
  <------objet------>
  dynamiquement au moment de l'exécution.
 */

/**
 *
 * @author Wassim Hazime
 */
namespace DesignPatterns\Structure\decorator;
interface InterfaceApp {
    public function select($table);
}
