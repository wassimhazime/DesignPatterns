<?php

/*
 * reçoit la commande et réalise les
opérations associées. Chaque objet Commande
concret possède un lien avec un objet Actions 
 */

/**
 * Description of ExempleModel
 *
 * @author wassime
 */
namespace DesignPatterns\Comportement\Command;
class Actions {
    public function action1() {
        return "A1";
    }
    public function action2() {
        return "A2";
    }
    public function action3() {
        return "A3";
    }
    public function action4() {
        return "A4";
    }
    public function action5() {
        return "A5";
    }
    public function action7() {
        return "A6";
    }
}
