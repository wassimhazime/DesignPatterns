<?php

/*
 Le Design Pattern permet d'isoler le lien entre
une couche de haut niveau et celle de bas niveau.
itor.
 */

/**
 * Description of BridgeTest
 *
 * @author wassime
 */
class BridgeTest extends PHPUnit\Framework\TestCase{
    public function testClientOracle() {
        $db=new \DesignPatterns\Structure\Bridge\DB\Oracle();
        $client=new \DesignPatterns\Structure\Bridge\Table\Client($db);
        $this->assertEquals($client->delete(), "delete  client in Oracle data base");
        $this->assertEquals($client->insert(), "insert  client in Oracle data base");
        $this->assertEquals($client->update(), "update  client in Oracle data base");
        
    }
    public function testClientMysqle() {
        $db=new \DesignPatterns\Structure\Bridge\DB\MySql();
        $client=new \DesignPatterns\Structure\Bridge\Table\Client($db);
        $this->assertEquals($client->delete(), "delete  client in MySQL data base");
        $this->assertEquals($client->insert(), "insert  client in MySQL data base");
        $this->assertEquals($client->update(), "update  client in MySQL data base");
    }
    public function testProduitOracle() {
        $db=new \DesignPatterns\Structure\Bridge\DB\Oracle();
        $Produit=new \DesignPatterns\Structure\Bridge\Table\Produit($db);
        $this->assertEquals($Produit->delete(), "delete  Produit in Oracle data base");
        $this->assertEquals($Produit->insert(), "insert  Produit in Oracle data base");
        $this->assertEquals($Produit->update(), "update  Produit in Oracle data base");
        
    }
    public function testProduitMysqle() {
        $db=new \DesignPatterns\Structure\Bridge\DB\MySql();
        $Produit=new \DesignPatterns\Structure\Bridge\Table\Produit($db);
        $this->assertEquals($Produit->delete(), "delete  Produit in MySQL data base");
        $this->assertEquals($Produit->insert(), "insert  Produit in MySQL data base");
        $this->assertEquals($Produit->update(), "update  Produit in MySQL data base");
    }
}
