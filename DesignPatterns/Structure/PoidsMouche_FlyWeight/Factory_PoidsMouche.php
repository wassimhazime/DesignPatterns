<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace DesignPatterns\Structure\PoidsMouche_FlyWeight;

/**
 * Description of Factory_PoidsMouche
 *
 * @author wassime
 */
class Factory_PoidsMouche {
    public $poidsMouchePartage=[];


    public function getPoidsMouchePartage($nom) {
        if (isset($this->poidsMouchePartage[$nom])) {
            return $this->poidsMouchePartage[$nom];
        }
        $partage=new PoidsMouchePartage($nom);
        $this->poidsMouchePartage[$nom]= $partage;
        return $partage;
        
    }
      public function getPoidsMoucheNomPartage($nom,$age) {
          return new PoidsMoucheNonPartage($nom, $age);
     }
}
