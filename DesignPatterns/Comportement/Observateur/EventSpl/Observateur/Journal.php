<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace DesignPatterns\Comportement\Observateur\EventSpl\Observateur;

/**
 * Description of Observer1
 *
 * @author wassime
 */
class Journal implements \SplObserver {
    //put your code here
     public function update(\SplSubject $obj)
  {
    echo 'Journal a été notifié ! Nouvelle valeur de l\'attribut <strong>data</strong> : ', $obj->getData()."<br>";
  }

}
