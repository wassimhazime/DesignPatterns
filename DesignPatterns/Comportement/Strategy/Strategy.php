<?php

/*
 * Vous avez une classe dédiée à une tâche spécifique.
 *  Dans un premier temps, celle-ci effectue une opération 
 * suivant un algorithme bien précis. Cependant, avec le temps, 
 * cette classe sera amenée à évoluer
 * , et elle suivra plusieurs algorithmes, tout en effectuant 
 * la même tâche de base.
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
            function setFormat($format) {
        $this->format = $format;
    }

    function __construct($txt) {
        $this->txt = $txt;
    }

    public function affiche() {
        echo  $this->format->textFormat($this->txt) ." <br>";
        
    }

   
}
