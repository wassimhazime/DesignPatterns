<?php

namespace DesignPatterns\Comportement\Observateur\Event;

/**
 * Le pattern observateur définit une relation
  entre les objets de type un à plusieurs, de
  façon que, lorsqu’un objet change d’état,
  tous ce qui en dépendent en soient informés
  et soient mis à jour automatiquement

 *
 * @author wassime
 */
class Lestener {

    private $priority;
    private $callback;

    private $final;

    function __construct($priority, $callback, $final) {
        $this->priority = $priority;
        $this->callback = $callback;
        $this->final = $final;
    }

    function getPriority() {
        return $this->priority;
    }

    function getFinal() {
        return $this->final;
    }

    public function call_function(array $param) {
        
       call_user_func_array($this->callback, $param);
   
    }

}
