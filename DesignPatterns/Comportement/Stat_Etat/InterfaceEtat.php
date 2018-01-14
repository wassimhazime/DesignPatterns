<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
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
