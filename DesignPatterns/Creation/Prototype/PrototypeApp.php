<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of PrototypeApp
 *
 * @author wassime
 */
namespace DesignPatterns\Creation\Prototype;

class PrototypeApp {
    private $classe;
    private $nom;
    private $prenom;
    private $age;
    private $ville;
    function __construct($classe, $nom, $prenom, $age, $ville) {
        $this->classe = $classe;
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->age = $age;
        $this->ville = $ville;
    }
    function getClasse() {
        return $this->classe;
    }

    function getNom() {
        return $this->nom;
    }

    function getPrenom() {
        return $this->prenom;
    }

    function getAge() {
        return $this->age;
    }

    function getVille() {
        return $this->ville;
    }

    function setClasse($classe) {
        $this->classe = $classe;
    }

    function setNom($nom) {
        $this->nom = $nom;
    }

    function setPrenom($prenom) {
        $this->prenom = $prenom;
    }

    function setAge($age) {
        $this->age = $age;
    }

    function setVille($ville) {
        $this->ville = $ville;
    }

    public function __clone(
         ) {
        return new self(   
        $this->classe ,
        $this->nom ,
        $this->prenom ,
        $this->age ,
        $this->ville);
    }
    public function copier() {
        return $this->__clone(); 
    }


}
