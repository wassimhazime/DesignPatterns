<?php



namespace DesignPatterns\Comportement\Event;

/**
 * Description of Lestener
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
