<?php

/*
 * Vous avez une classe dédiée à une tâche spécifique.
 *  Dans un premier temps, celle-ci effectue une opération 
 * suivant un algorithme bien précis. Cependant, avec le temps, 
 * cette classe sera amenée à évoluer
 * , et elle suivra plusieurs algorithmes, tout en effectuant 
 * la même tâche de base.
 * 
 *  Les méthodes Template utilisent l’héritage pour faire varier des parties d’un algorithme
     Les stratégies utilisent la délégation pour faire varier tout l’algorithme.
 */

/**
 * Description of Vue
 *
 * @author wassime
 */
namespace DesignPatterns\Comportement\Strategy;

class Strategy {
    private $format;
    private $txt;
            function setFormat(IStyle $format) {
             $this->format = $format;
    }

    function __construct($txt) {
        $this->txt = $txt;
    }

    public function affiche() {
        
        return  $this->format->textFormat($this->txt) ." <br>";
        
    }

   
}
