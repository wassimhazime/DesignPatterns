<?php

/*
 Le Design Pattern permet d'isoler le lien entre
une couche de haut niveau et celle de bas niveau.

 */

namespace DesignPatterns\Structure\Bridge\DB;

/**
 * Description of Oracle
 *
 * @author wassime
 */
class Oracle implements InterfaceDB{
       //put your code here
    public function exe(): string {
        return "Oracle data base";
    }
}
