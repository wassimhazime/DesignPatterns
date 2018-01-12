<?php

/*
  implémente l'interface poids-mouche. Les
informations contenues dans un ConcretePoidsMouche sont
intrinsèques (sans lien avec son contexte). Puisque, ce type de poids
mouche est obligatoirement partagé.

 */

namespace DesignPatterns\Structure\PoidsMouche_FlyWeight;

/**
 * Description of PoidsMouchePartage
 *
 * @author wassime
 */
class PoidsMouchePartage implements IFlyWeight{
    public $nom;
    function __construct($nom) {
        $this->nom = $nom;
    }

    
    public function afficheNom() {
        return $this->nom ;
    }

}
