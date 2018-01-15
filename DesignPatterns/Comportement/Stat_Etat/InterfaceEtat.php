<?php

/*
 * Le pattern Etat permet de déléguer le comportement
d'un objet dans un autre objet. Cela permet de changer
le comportement de l'objet en cours d'exécution et de
simuler un changement de classe.

 */

/**
 *
 * @author wassime
 */
namespace DesignPatterns\Comportement\Stat_Etat;
interface InterfaceEtat {

    
     function __construct( $data) ;
    public function ouvrer( $txt) ;
    public function modifie( $txt) ;

    public function sauvegarde( $txt) ;
    public function ferme($txt) ;
    
}
