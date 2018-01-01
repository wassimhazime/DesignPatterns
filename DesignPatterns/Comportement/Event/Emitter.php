<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace DesignPatterns\Comportement\Event;

/**
 * Description of event
 *
 * @author wassime
 */
class Emitter {

    private $lesteners = [];
    private static $event = null;

    public static function getEvent(): self {

        if (self::$event == null) {
            self::$event = new self;
        }

        return self::$event;
    }

///////////////////////////////////////////////////////////////////////////////////////////////////////////
    public function on(string $action, callable $callable, int $priority = 0, int $NB_call = -1, bool $final = false) {
        if (!$this->hasLisener($action)) {
            $this->lesteners[] = $action;
        }
        $this->lesteners[$action][] = new Lestener($priority, $callable, $NB_call, $final);
        $this->sortLestener($action);
    }

/////link once
    public function once(string $action, callable $callable, int $priority = 0, bool $final = false) {
        $this->on($action, $callable, $priority, 1, $final);
    }

    public function once_final(string $action, callable $callable, int $priority = 0) {
        $this->on($action, $callable, $priority, 1, true);
    }

    public function on_final(string $action, callable $callable, int $priority = 0, int $NB_call = -1) {
        $this->on($action, $callable, $priority, $NB_call, TRUE);
    }

////////////////////////////////////////////////////////////////////////////////////////////////////////////
    public function emit(string $action, ...$arge) {

        if ($this->hasLisener($action)) {
            foreach ($this->lesteners[$action] as $lestener) {

                $nb_call = $lestener->call_function($arge);
                if ($lestener->getFinal() == TRUE) {
                    break;
                }
            }
        }
    }

/////////////////////////////////////////////////////////////////////////////////////////////////////////////
    private function sortLestener(string $action) {


        uasort($this->lesteners[$action], function ($lestener1, $lestener2) {

            return $lestener1->getPriority() >= $lestener2->getPriority();
        });
    }

    private function hasLisener(string $action): bool {

        return isset($this->lesteners[$action]);
    }

}
