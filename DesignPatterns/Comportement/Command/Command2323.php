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
class Command2323 implements InterfaceCommand{
 
    public function exec(Actions $actions) {
        return $actions->action2()
                .$actions->action3()
                .$actions->action2()
                .$actions->action3(); 
    }

}
