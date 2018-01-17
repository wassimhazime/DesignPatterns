<?php

/*
 Le Design Pattern permet d'isoler le lien entre
une couche de haut niveau et celle de bas niveau.

 */

/**
 *
 * @author wassime
 */
namespace DesignPatterns\Structure\Bridge\Table;

interface InterfaceTable {
    function __construct(\DesignPatterns\Structure\Bridge\DB\InterfaceDB $db);
    function insert() ;
    function delete() ;
    function update() ;
}
