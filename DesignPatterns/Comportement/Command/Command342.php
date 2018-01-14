<?php

/*
  * implémentent
une commande. Chaque classe implémente la
méthode executer(), en appelant des méthodes de
l'objet Actions.
 */

namespace DesignPatterns\Comportement\Command;

/**
 * Description of Command1
 *
 * @author wassime
 */
class Command342 implements InterfaceCommand{
 
    public function exec(Actions $actions) {
        return $actions->action3().$actions->action4().$actions->action2(); 
    }

}
