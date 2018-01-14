<?php

/*
 * Objectif du pattern
◦ Définir le squelette d'un algorithme en déléguant
certaines étapes à des sous-classes.
Résultat :
◦ Le Design Pattern permet d'isoler les parties
variables d'un algorithme.
Raisons d’utilisation :
◦ Une classe possède un fonctionnement global,
mais les détails de son algorithme doivent être
spécifiques à ses sous-classes.
 * 
 * 
 * Les méthodes Template utilisent l’héritage pour faire varier des parties d’un algorithme
   Les stratégies utilisent la délégation pour faire varier tout l’algorithme.

 */

/**
 *
 * @author wassime
 */
namespace DesignPatterns\Comportement\TemplateMethod;

abstract class  AbstractTemplateMethod {
    
    public function traitement(int $start) :int{
        return $this->method1()+$this->method2()+$start;
    }
    
    
    //varier des parties d’un algorithme
    public abstract function method1():int ;
    public abstract  function method2():int ;
  
}
