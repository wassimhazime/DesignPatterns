<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace DesignPatterns\Structure\Adapter;

/**
 * Description of AutreClass
 *
 * @author wassime
 */
class AutreClass {
    public function add() {
   $nombres=    func_get_args();
   $somme=0;
   for ($index = 0; $index < count($nombres); $index++) {
       $somme=$somme+$nombres[$index];
   }
   return $somme;
    }
}
