<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace DesignPatterns\Comportement\TemplateMethod;

/**
 * Description of AppTemplateMethod
 *
 * @author wassime
 */
class AppTemplateMethod {
    public function call(int $strat, AbstractTemplateMethod $tem) :int{
        return $tem->traitement($strat);
    }
}
