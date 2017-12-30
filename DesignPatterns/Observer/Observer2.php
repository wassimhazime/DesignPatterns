<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace DesignPatterns\Observer;

/**
 * Description of Observer1
 *
 * @author wassime
 */
class Observer2 implements \SplObserver {
    //put your code here
     public function update(\SplSubject $obj)
  {
    echo 'Observer2 a été notifié ! Nouvelle valeur de l\'attribut <strong>nom</strong> : ', $obj->getNom()."<br>";
  }

}
