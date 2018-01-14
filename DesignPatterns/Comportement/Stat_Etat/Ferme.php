<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace DesignPatterns\Comportement\Stat_Etat;

/**
 * Description of Ferme
 *
 * @author wassime
 */
class Ferme implements InterfaceEtat{
   private $txt;
    public function __construct($txt) {
         
         $this->txt="".$txt."|ferme ";
    }

    public function fin(): string{
        return $this->txt;
        
    }

    public function ferme($txt) {
     throw    new \Exception("impossible c'est etat");
    }

    public function modifie($txt) {
     throw   new \Exception("impossible c'est etat");
    }

    public function ouvrer($txt) {
     throw  new \Exception("impossible c'est etat");
    }

    public function sauvegarde($txt="") {
    throw    new \Exception("impossible c'est etat");
    }

}
