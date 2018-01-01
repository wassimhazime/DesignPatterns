<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Event
 *
 * @author wassime
 */
namespace DesignPatterns\Comportement\EventPsr;


class Event implements EventInterface{

    private $name = "";
    private $params = [];
    private $target;
    private $propagationStopped=false;

    
    
    
    
    public function getName(): string {
        return $this->name;
    }

    public function getParam($name) {
        if (isset($this->params[$name])) {
            return $this->params[$name];
        } else {
            return null;
        }
    }

    public function getParams(): array {
        return $this->params;
    }

    public function getTarget() {
        return $this->target;
    }

    public function isPropagationStopped(): bool {
        return $this->propagationStopped;
        
    }

    public function setName($name): void {
        $this->name=$name;
        
    }

    public function setParams(array $params): void {
        $this->params=$params;
        
    }

    public function setTarget($target): void {
        $this->target=$target;
        
    }

    public function stopPropagation($flag) {
        $this->propagationStopped=$flag;
    }

}
