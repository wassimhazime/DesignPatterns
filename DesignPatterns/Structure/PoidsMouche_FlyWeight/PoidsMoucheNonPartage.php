<?php

/*
 *  implémente l'interface
poids-mouche. Ce type de poids-mouche n'est pas partagé. Il possède
des données intrinsèques et extrinsèques.

 */

namespace DesignPatterns\Structure\PoidsMouche_FlyWeight;

/**
 * Description of PoidsMoucheNonPartage
 *
 * @author wassime
 */
class PoidsMoucheNonPartage implements IFlyWeight{
    public $nom;
    public $age;
    //put your code here
    function __construct($nom, $age) {
        $this->nom = $nom;
        $this->age = $age;
    }

    public function afficheNom() {
        return $this->nom ;
    }
    public function afficheage() {
        return "  ".$this->age;
    }
    
     public function affiche() {
        return $this->nom ."  ".$this->age;
    }
}
