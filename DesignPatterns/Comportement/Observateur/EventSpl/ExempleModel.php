<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace DesignPatterns\Comportement\Observateur\EventSpl;

/**
 * Description of ExempleModel
 *
 * @author wassime
 */
class ExempleModel extends Observee{
    // Dès que cet attribut changera on notifiera les classes observatrices.
    protected $data;
    
     public function getData() {
        return $this->data;
    }

    public function setData($data) {
        $this->data = $data;
        $this->notify();
    }
}
