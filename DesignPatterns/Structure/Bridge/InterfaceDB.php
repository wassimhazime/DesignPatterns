<?php

/*
 Le Design Pattern permet d'isoler le lien entre
une couche de haut niveau et celle de bas niveau.

 */

namespace DesignPatterns\Structure\Bridge;

/**
 *
 * @author wassime
 */
interface InterfaceDB {
   function exe() : string;
}
