<?php

/*
L'interface SplSubject est utilisée conjointement
 *  avec la classe SplObserver pour 
 * l'implémentation du patron de conception Observateur.
 * 
 * SplSubject::attach — Attache un SplObserver
   SplSubject::detach — Détache un observateur
   SplSubject::notify — Notifie un observateur
 * 
 * 
 * 
 */

/**
 * Description of Observee
 *
 * @author wassime
 */

namespace DesignPatterns\Comportement\Observateur\EventSpl;


class Observee implements \SplSubject {

    
  

    /////////////////////////////////////////////////////////////////////////
    /*
     * L'interface SplSubject est utilisée conjointement
 *  avec la classe SplObserver pour 
 * l'implémentation du patron de conception Observateur.
 * 
 * SplSubject::attach — Attache un SplObserver
   SplSubject::detach — Détache un observateur
   SplSubject::notify — Notifie un observateur
     */
  
    
    // Ceci est le tableau qui va contenir tous les objets qui nous observent.
    protected $observers = [];
    
    public function attach(\SplObserver $observer) {
        $this->observers[] = $observer;
    }

    public function detach(\SplObserver $observer) {
        if (is_int($key = array_search($observer, $this->observers, true))) {
            unset($this->observers[$key]);
        }
    }

    public function notify() {
        foreach ($this->observers as $observer) {
            $observer->update($this);
        }
    }
   
    
    
    
    

   

}
