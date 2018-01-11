<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of decorator
 *
 * @author wassime
 */
use DesignPatterns\Structure\decorator\sql;
class decoratorTest extends \PHPUnit\Framework\TestCase {
    
    public function testdecorator() {
       $sql=new sql();
       $s=  $sql->select("produit");
       $this-> assertEquals($s, "select * from produit");
       
     
       
       
       $joit=new \DesignPatterns\Structure\decorator\DecoratorJoin($sql);
       $s=$joit->select("produit");
       $this->assertEquals($s, "select * from produit join categorie on id_categorie=id_produit");
       
       
       $where=new \DesignPatterns\Structure\decorator\DecoratorWhere($sql);
       $s=$where->select("produit", 6);
       
       $this-> assertEquals($s, "select * from produit where id=6");
       
       
        $where=new \DesignPatterns\Structure\decorator\DecoratorWhere($joit);
       $s=$where->select("produit", 6);
       
       $this-> assertEquals($s, "select * from produit join categorie on id_categorie=id_produit where id=6");
        
    }
    
    
}
