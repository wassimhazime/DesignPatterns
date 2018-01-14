<?php

/*
Objectif du pattern
◦ Encapsuler une requête sous la forme d' objet.
◦ Paramétrer facilement des requêtes diverses.
◦ Permettre des opérations réversibles.
Résultat :
◦ Le Design Pattern permet d'isoler une
requête.

 */

namespace DesignPatterns\Comportement\Command;

/**
 *
 * @author wassime
 */
interface InterfaceCommand {
    public function exec(Actions $actions);
}
