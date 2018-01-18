<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of FluentTest
 *
 * @author wassime
 */
use DesignPatterns\Comportement\Fluent\Fluent;
class FluentTest extends PHPUnit\Framework\TestCase{
    public function testFluent() {
        $sql="SELECT marque,prix FROM prd WHERE id > 66";
        $requetSqlavecQuery= (new Fluent())->select("marque,prix")->from("prd")->where("id > 66")->query();
        $requetSql= (new Fluent())->select("marque,prix")->from("prd")->where("id > 66");
        $this->assertEquals($sql, $requetSqlavecQuery);
        $this->assertEquals($sql, $requetSql);
       
    }
    public function testFluentalias() {
        $sql="SELECT marque,prix FROM prd AS produit WHERE id > 66";
        $requetSqlavecQuery= (new Fluent())->select("marque,prix")->from("prd","produit")->where("id > 66")->query();
        $requetSql= (new Fluent())->select("marque,prix")->from("prd","produit")->where("id > 66");
        $this->assertEquals($sql, $requetSqlavecQuery);
        $this->assertEquals($sql, $requetSql);
       
    }
}
