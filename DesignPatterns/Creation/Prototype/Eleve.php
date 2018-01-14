<?php

/*
 *L’objectif du pattern PROTOTYPE est de fournir de nouveaux
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

/**
 * Description of PrototypeApp
 *
 * @author wassime
 */
namespace DesignPatterns\Creation\Prototype;

class Eleve implements InterfacePrototype{
    private $classe;
    private $nom;
    private $prenom;
    private $age;
    private $ville;
    function __construct($classe, $nom, $prenom, $age, $ville) {
        $this->classe = $classe;
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->age = $age;
        $this->ville = $ville;
    }
    function getClasse() {
        return $this->classe;
    }

    function getNom() {
        return $this->nom;
    }

    function getPrenom() {
        return $this->prenom;
    }

    function getAge() {
        return $this->age;
    }

    function getVille() {
        return $this->ville;
    }

    function setClasse($classe) {
        $this->classe = $classe;
    }

    function setNom($nom) {
        $this->nom = $nom;
    }

    function setPrenom($prenom) {
        $this->prenom = $prenom;
    }

    function setAge($age) {
        $this->age = $age;
    }

    function setVille($ville) {
        $this->ville = $ville;
    }

    public function __clone(
         ) {
        return new self(   
        $this->classe ,
        $this->nom ,
        $this->prenom ,
        $this->age ,
        $this->ville);
    }
    public function copier() {
        return $this->__clone(); 
    }


}
