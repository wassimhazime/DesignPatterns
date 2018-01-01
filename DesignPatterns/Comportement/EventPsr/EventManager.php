<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of EventManager
 *
 * @author wassime
 */

namespace DesignPatterns\Comportement\EventPsr;

class EventManager implements EventManagerInterface {

    private $lesteners = [];

    public function attach($event, $callback, $priority = 0): bool {
        if (!$this->hasLisener($event)) {
            $this->lesteners[] = $event;
        }
        $this->lesteners[$event][] = new Lestener($priority, $callback, -1, false);
        $this->sortLestener($event);

        return TRUE;
    }

    public function clearListeners($event): void {
        if ($this->hasLisener($event)) {
            $this->lesteners[$event] = [];
        }
    }

    public function detach($event, $callback): bool {
        $this->lesteners[$event]= array_filter($this->lesteners[$event]
                , function ($lesteners) use ($callback){
           return $lesteners->getCallback() != $callback ;
        });
        
        return true;
        
    }

    public function trigger($event, $target = null, $argv = array()) { //event (emit)
        if (is_string($event)) {
            $event = $this->makeEvent($event, $target , $argv);
        }
        if ($this->hasLisener($event->getName())) {
            foreach ($this->lesteners[($event->getName())] as $lestener) {

                $nb_call = $lestener->call_function($event->getParams());
                if ($lestener->getFinal() == TRUE) {
                    break;
                }
            }
        }
    }

    //////////////////////////////////////////////////////////////////////////////////

    private function makeEvent(string $event, $target = null,  $argv = array()) {
        $e = new Event();
        $e->setName($event);
        $e->setTarget($target);
        $e->setParams($argv);
        return $e;
    }

    private function sortLestener(string $action) {


        uasort($this->lesteners[$action], function ($lestener1, $lestener2) {

            return $lestener1->getPriority() >= $lestener2->getPriority();
        });
    }

    private function hasLisener(string $action): bool {

        return isset($this->lesteners[$action]);
    }

}
