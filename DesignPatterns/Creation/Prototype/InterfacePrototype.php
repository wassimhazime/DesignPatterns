<?php

/*
L’objectif du pattern PROTOTYPE est de fournir de nouveaux
objets par la copie d’un exemple plutôt que de produire
de nouvelles instances non initialisées d’une classe.
Raisons d’utilisation
◦ Le système doit créer de nouvelles instances, mais il ignore de
quelle classe. Il dispose cependant d'instances de la classe
désirée.
◦ La duplication peut être également intéressante pour les
performances (la duplication est plus rapide que l'instanciation).
Résultat :
◦ Le Design Pattern permet d'isoler l'appartenance à une classe.

 */

namespace DesignPatterns\Creation\Prototype;

/**
 *
 * @author wassime
 */
interface InterfacePrototype {
    function copier() ;
}
