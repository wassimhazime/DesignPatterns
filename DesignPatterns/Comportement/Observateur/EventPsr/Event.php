<?php

/*
 * Le pattern observateur définit une relation
  entre les objets de type un à plusieurs, de
  façon que, lorsqu’un objet change d’état,
  tous ce qui en dépendent en soient informés
  et soient mis à jour automatiquement

 */

/**
 * Description of Event
 *
 * @author wassime
 */

namespace DesignPatterns\Comportement\Observateur\EventPsr;

use DesignPatterns\Comportement\Observateur\EventPsr\InterfacePSR14\EventInterface;

class Event implements EventInterface {

    private $name = "";
    private $params = [];
    private $target;
    private $propagationStopped = false;

    public function getName(): string {
        return $this->name;
    }

    public function getParam(string $name) {
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

    public function setName(string $name): void {
        $this->name = $name;
    }

    public function setParams(array $params): void {
        $this->params = $params;
    }

    public function setTarget($target): void {
        $this->target = $target;
    }

    public function stopPropagation(bool $flag) {
        $this->propagationStopped = $flag;
    }

}
