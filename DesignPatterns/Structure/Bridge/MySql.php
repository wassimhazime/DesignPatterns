<?php

/*
 Le Design Pattern permet d'isoler le lien entre
une couche de haut niveau et celle de bas niveau.
r.
 */

namespace DesignPatterns\Structure\Bridge;

/**
 * Description of MySql
 *
 * @author wassime
 */
class MySql implements InterfaceDB{
    //put your code here
    public function exe(): string {
        return "MySQL data base";
    }

}
