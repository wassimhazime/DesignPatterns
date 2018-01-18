<?php

/*
 * Le pattern observateur définit une relation
  entre les objets de type un à plusieurs, de
  façon que, lorsqu’un objet change d’état,
  tous ce qui en dépendent en soient informés
  et soient mis à jour automatiquement

 */

namespace DesignPatterns\Comportement\Observateur\Event;

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
    public function on(string $action, callable $callable, int $priority = 0, bool $final = false) {

        if (!$this->hasLisener($action)) {
            $this->lesteners[] = $action;
        }


        $this->lesteners[$action][] = new Lestener($priority, $callable, $final);
        $this->sortLestener($action);
    }

    public function once(string $action, callable $callable, int $priority = 0) {
        $this->on($action, $callable, $priority, true);
    }

////////////////////////////////////////////////////////////////////////////////////////////////////////////
    public function emit(string $action, ...$arge) {

        if ($this->hasLisener($action)) {
            foreach ($this->lesteners[$action] as $lestener) {
                
                $lestener->call_function($arge);
                
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
