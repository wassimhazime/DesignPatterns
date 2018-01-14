<?php

/*
déclenche la commande. Il appelle la
méthode executer() d'un objet Commande
 */

namespace DesignPatterns\Comportement\Command;

/**
 * Description of Invoqueur
 *
 * @author wassime
 */
class Invoqueur {
    private $commands=[];
    private $Action;
    function __construct(Actions $Action) {
        $this->Action = $Action;
    }

    
    public function setCommands(string $cmd, InterfaceCommand $command) {
        $this->commands[$cmd] = $command;
    }

    public function run(string $cmd) {
        if(isset($this->commands[$cmd])){
        $command= $this->commands[$cmd];
        return   $command->exec($this->Action);}
        return "";
    }
}
