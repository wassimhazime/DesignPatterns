<?php

/*
Aujourd'hui nous allons parler d'un pattern assez particulier :
 *  Le conteneur d'injecteur de dépendance.
 *  Le but de ce pattern et d'être capable de résoudre les dépendances d'un objet simplement.

Le problème
Afin d'avoir un code bien organisé et testable,
 *  on utilise l'injection de dépendance mais
 *  cette méthodologie peut parfois rendre les objets difficiles à instancier.
 */

namespace DesignPatterns\Creation\Container;

/**
 *
 * @author wassime
 */
interface InterfaceSetDIC {
    
    public function set($id,$object) ;
    /*
     * déterminer les dépendances et essayer des les résoudre automatiquemen
     */
   
}
