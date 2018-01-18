<?php

/*
 L'interface SplObserver est utilisée conjointement avec
 *  la classe SplSubject pour 
 * l'implémentation du patron de conception Observateur.
 * 
 * SplObserver::update — Réception d'une mise à jour depuis un sujet
 */

namespace DesignPatterns\Comportement\Observateur\EventSpl\Observateur;

/**
 * Description of Observer1
 *
 * @author wassime
 */
class MessageFlash implements \SplObserver {
   
     public function update(\SplSubject $obj)
  {
    echo 'MessageFlash a été notifié ! Nouvelle valeur de l\'attribut <strong>data</strong> : '.
            $obj->getData() .
            "<br>";
  }

}
