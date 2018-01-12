<?php

/*
 En externalisant les attributs intrinsèques des objets (style de trait), on
peut avoir en mémoire une seule instance correspondant à un groupe
de valeurs (simple-continu-sans ombre, double-pointillé-ombre).
Chaque objet avec des attributs extrinsèques (trait avec les
coordonnées) possède une référence vers une instance d'attributs
intrinsèques (style de trait).
On obtient deux types de poids-mouche : les poids-mouche partagés
(style de trait) et les poids mouche non partagés (le trait avec ses
coordonnées).
La partie cliente demande le poids-mouche qui l'intéresse à la fabrique
de poids-mouche. S'il s'agit d'un poids mouche non partagé, la fabrique
le créera et le retournera.
S'il s'agit d'un poids-mouche partagé, la fabrique vérifiera si une
instance existe. Si une instance existe, la fabrique la retourne, sinon la
fabrique la crée et la retourne.

 */

/**
 * Description of PoidsMouche_FlyWeight
 *
 * @author wassime
 */
use DesignPatterns\Structure\PoidsMouche_FlyWeight\Factory_PoidsMouche;
class PoidsMouche_FlyWeightTest extends PHPUnit\Framework\TestCase{
    
    public function testObjectPartage() {
        $factory=new Factory_PoidsMouche();
        $a=$factory->getPoidsMouchePartage("awa");
        $b=$factory->getPoidsMouchePartage("awa");
        $wassim=$factory->getPoidsMouchePartage("wassim");
        $this->assertEquals($b, $a);
        $this->assertEquals($b->afficheNom(), $a->afficheNom());
        $this->assertEquals($wassim->afficheNom(), "wassim");
        
    }
   public function testObjectNomPartage() {
        $factory=new Factory_PoidsMouche();
        $a=$factory->getPoidsMoucheNomPartage("awa", 12);
        $b=$factory->getPoidsMoucheNomPartage("awa", 12);
          
          $this->assertEquals($a->age, $b->age);
          $this->assertEquals($a->nom, $b->nom);
          $this->assertEquals($a!==$b, true);
          $this->assertEquals($a==$b, true);
    }
}
