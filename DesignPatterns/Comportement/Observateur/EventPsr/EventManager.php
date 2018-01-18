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

namespace DesignPatterns\Comportement\Observateur\EventPsr;

use DesignPatterns\Comportement\Observateur\EventPsr\InterfacePSR14\EventManagerInterface;
use DesignPatterns\Comportement\Observateur\EventPsr\InterfacePSR14\EventInterface;

class EventManager implements EventManagerInterface {

    private $events = [];

    public function attach(string $event, callable $callback, int $priority = 0): bool {
        $this->events[$event][] = [
            "call" => $callback,
            "priority" => $priority
        ];

        return isset($this->events[$event]);
    }

    public function detach(string $event, callable $callback): bool {

        $array_detach = array_filter($this->events[$event], function ($e) use ($callback) {
            return $e["call"] != $callback;
        });

        $flage = count($array_detach) != count($this->events[$event]);
        $this->events[$event] = $array_detach;

        return $flage;
    }

    public function clearListeners(string $event): void {
        if ($this->hasEvents($event)) {
            $this->events[$event] = [];
        }
    }

    public function trigger($event, $target = null, $args = array()) {
        if (is_string($event)) {
            $event = $this->makeEvent($event, $target, $args);
        }

        if ($this->hasEvents($event->getName())) {
            $events = $this->events[$event->getName()]; /// arrays [callback=>"",proiori=>""][callback=>"",proiori=""]
            $this->sortEvents($events);
            foreach ($events as $e) {
                call_user_func($e["call"], $event);

                if ($event->isPropagationStopped()) {
                    break;
                }
            }
        }
    }

    //////////////////////////////////////////////////////////////////////////////////

    private function makeEvent(string $event, $target = null, $args = array()): EventInterface {
        $e = new Event();
        $e->setName($event);
        $e->setTarget($target);
        $e->setParams($args);

        return $e;
    }

    private function sortEvents(array &$events) {
        uasort($events, function ($event1, $event2) {

            return $event2["priority"] < $event1["priority"];
        });
    }

    private function hasEvents(string $event): bool {

        return isset($this->events[$event]);
    }

}
