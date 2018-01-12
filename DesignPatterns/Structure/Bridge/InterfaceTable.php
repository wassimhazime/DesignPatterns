<?php

/*
 Le Design Pattern permet d'isoler le lien entre
une couche de haut niveau et celle de bas niveau.

 */

/**
 *
 * @author wassime
 */
namespace DesignPatterns\Structure\Bridge;
interface InterfaceTable {
    function __construct(InterfaceDB $db);
    function insert() ;
    function delete() ;
    function update() ;
}
