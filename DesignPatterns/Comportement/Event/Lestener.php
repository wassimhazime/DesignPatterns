<?php



namespace DesignPatterns\Comportement\Event;

/**
 *Le pattern observateur définit une relation
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
    private $NB_call;
    private $comp=1;
    private $final;
            
    function __construct($priority, $callback,$NB_call,$final) {
        $this->priority = $priority;
        $this->callback = $callback;
        $this->NB_call=$NB_call;
        $this->final=$final;
    }
    function getPriority() {
        return $this->priority;
    }
    function getFinal() {
        return $this->final;
    }

            public function call_function($param): int {
            if($this->NB_call!=0){
             call_user_func_array($this->callback, $param);
             $this->NB_call--;
             
            }
            return $this->comp++;
    }

    
}
