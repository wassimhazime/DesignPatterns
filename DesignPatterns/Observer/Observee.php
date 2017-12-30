<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Observee
 *
 * @author wassime
 */

namespace DesignPatterns\Observer;


class Observee implements \SplSubject {

    // Ceci est le tableau qui va contenir tous les objets qui nous observent.
    protected $observers = [];
    // Dès que cet attribut changera on notifiera les classes observatrices.
    protected $nom;

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

    public function getNom() {
        return $this->nom;
    }

    public function setNom($nom) {
        $this->nom = $nom;
        $this->notify();
    }

}
