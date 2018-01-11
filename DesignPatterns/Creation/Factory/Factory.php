<?php

/*
 * Le principe est d'avoir une classe qui va 
 * se charger de créer les objets dont on a besoin.
 * 
 * 
 * Le problème

Admettons que vous venez de créer une application relativement importante. 
 * Vous avez construit cette application en associant plus ou moins la plupart 
 * de vos classes entre elles. À présent, vous voudriez modifier un petit morceau 
 * de code afin d'ajouter une fonctionnalité à l'application. Problème : étant donné
 *  que la plupart de vos classes sont plus ou moins liées, il va falloir modifier un 
 * tas de chose ! Le pattern Factory pourra sûrement vous aider.

Ce motif est très simple à construire. En fait, si vous implémentez ce pattern, 
 * vous n'aurez plus denewà placer dans la partie globale du script afin d'instancier 
 * une classe. En effet, ce ne sera pas à vous de le faire mais à une classe usine.
 *  Cette classe aura pour rôle de charger les classes que vous lui passez en argument.
 *  Ainsi, quand vous modifierez votre code, vous n'aurez qu'à modifier le masque d'usine 
 * pour que la plupart des modifications prennent effet. En gros, vous ne vous soucierez 
 * plus de l'instanciation de vos classes, ce sera à l'usine de le faire !

Voici comment se présente une classe implémentant le pattern Factory :
 */

namespace DesignPatterns\Creation\Factory;

/**
 * Description of Factory ==> usine
 *
 * @author Wassim Hazime
 */
class Factory {

    public static function get(string $class) {
        $class=strtoupper ($class);
        if ($class == "A") {return self::getA();}

        if ($class == "B") { return self::getB();}
        
    }

    public static function getA(string $name = "name", int $age = 5) {
        return new A($name, $age);
    }

    public static function getB(string $name = "name", int $age = 5, string $adress = "") {
        return new B(self::getA($name, $age), $adress);
    }
///////////////  EXEMPLE PDO  ////////////////////////////////////////////////////////////////
    public static function getMysqlConnexion()
  {
    $db = new PDO('mysql:host=localhost;dbname=tests', 'root', '');
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    return $db;
  }
  
  public static function getPgsqlConnexion()
  {
    $db = new PDO('pgsql:host=localhost;dbname=tests', 'root', '');
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    return $db;
  }
    
    
}
