<?php

/*
 * implémentent
une commande. Chaque classe implémente la
méthode executer(), en appelant des méthodes de
l'objet Actions
 */

namespace DesignPatterns\Comportement\Command;

/**
 * Description of Command1
 *
 * @author wassime
 */
class Command122 implements InterfaceCommand{
 
    public function exec(Actions $actions) {
        return $actions->action1().$actions->action2().$actions->action2(); 
    }

}
