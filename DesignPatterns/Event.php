<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace DesignPatterns;

/**
 * Description of event
 *
 * @author wassime
 */
class Event {

    private $lisner = [];
    private static $event = null;

    public static function getEvent() {

        if (self::$event == null) {
            self::$event = new self;
        }

        return self::$event;
    }

    public function on($action, $callable) {
        if (!$this->hasLisener($action)) {
            $this->lisner[] = $action;
        }

        $this->lisner[$action][] = $callable;
    }

    public function emit($action, ...$arge) {

        if ($this->hasLisener($action)) {
            foreach ($this->lisner[$action] as $event) {
                call_user_func_array($event, $arge);
            }
        }
    }
    
    
    

    private function hasLisener(string $action): bool {

        return isset($this->lisner[$action]);
    }

}
