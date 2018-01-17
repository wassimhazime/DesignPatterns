<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace DesignPatterns\Creation\Builder;

/**
 * Description of ProduitPC
 *
 * @author wassime
 */
class ProduitPC {
    private $cpu;
    private $ram;
    private $disque_dur;
    private $ecran;
    private $carte_mere;
    
    
    function __construct($cpu, $ram, $disque_dur, $ecran, $carte_mere) {
        $this->cpu = $cpu;
        $this->ram = $ram;
        $this->disque_dur = $disque_dur;
        $this->ecran = $ecran;
        $this->carte_mere = $carte_mere;
    }

    function getCpu() {
        return $this->cpu;
    }

    function getRam() {
        return $this->ram;
    }

    function getDisque_dur() {
        return $this->disque_dur;
    }

    function getEcran() {
        return $this->ecran;
    }

    function getCarte_mere() {
        return $this->carte_mere;
    }

    function setCpu($cpu) {
        $this->cpu = $cpu;
    }

    function setRam($ram) {
        $this->ram = $ram;
    }

    function setDisque_dur($disque_dur) {
        $this->disque_dur = $disque_dur;
    }

    function setEcran($ecran) {
        $this->ecran = $ecran;
    }

    function setCarte_mere($carte_mere) {
        $this->carte_mere = $carte_mere;
    }


   
  


}
