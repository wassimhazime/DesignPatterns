<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace DesignPatterns\Comportement\Stat_Etat;

/**
 * Description of Modifier
 *
 * @author wassime
 */
class Modifier implements InterfaceEtat{
    private $txt;
    public function __construct($txt) {
      
         $this->txt="".$txt."|modifier ";
    }

public function ferme($txt) {
        return new Ferme($this->txt.$txt);
    }

    public function modifie($txt) {
        return new Modifier($this->txt.$txt);
    }

    public function ouvrer($txt) {
    throw  new \Exception("impossible c'est etat"); 
    }

    public function sauvegarde($txt="") {
        return new Sauvegarde($this->txt.$txt);
    }
}
