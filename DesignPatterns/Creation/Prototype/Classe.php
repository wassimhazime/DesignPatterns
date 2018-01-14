<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace DesignPatterns\Creation\Prototype;

/**
 * Description of Classe
 *
 * @author wassime
 */
class Classe {
    private $name;
    private $prof;
    private $nombreEleve;
    function __construct($name, $prof, $nombreEleve) {
        $this->name = $name;
        $this->prof = $prof;
        $this->nombreEleve = $nombreEleve;
        
    }

    function getName() {
        return $this->name;
    }

    function getProf() {
        return $this->prof;
    }

    function getNombreEleve() {
        return $this->nombreEleve;
    }

    function setName($name) {
        $this->name = $name;
    }

    function setProf($prof) {
        $this->prof = $prof;
    }

    function setNombreEleve($nombreEleve) {
        $this->nombreEleve = $nombreEleve;
    }


}
