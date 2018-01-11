<?php

/*
 * Fournir un intermédiaire entre la partie cliente et un
objet pour contrôler les accès à ce dernier.
.
 */

namespace DesignPatterns\Structure\Proxy;

/**
 * Description of Proxy
 *
 * @author wassime
 */
class Proxy implements InerfaceAccessData{
    
    private $password;
    function __construct($password) {
        $this->password = $password;
    }

            public function getData(): string {
            
            if($this->password==123){
           $data = new AccessData();
            return $data->getData();}
            return "access denied";
    }

}
