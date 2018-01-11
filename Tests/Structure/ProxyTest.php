<?php

/*
 *Fournir un intermédiaire entre la partie cliente et un
objet pour contrôler les accès à ce dernier.

 */

/**
 * Description of ProxyTest
 *
 * @author wassime
 */
use DesignPatterns\Structure\Proxy\Proxy;
use DesignPatterns\Structure\Proxy\AccessData;
class ProxyTest extends PHPUnit\Framework\TestCase{
    
     public function test_not_proxy() {
        $data=new AccessData();
        $str=$data->getData();
        $this->assertEquals($str, "le nom est wassim hazime");
        
    }
    
    public function testproxy_passord_ok() {
        $data=new Proxy(123);
        $str=$data->getData();
        $this->assertEquals($str, "le nom est wassim hazime");
        
    }
    public function testproxy_passord_error() {
      $data=new Proxy(000);
        $str=$data->getData(); 
         $this->assertEquals($str, "access denied");
    }
}
