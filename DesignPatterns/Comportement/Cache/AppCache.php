<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace DesignPatterns\Comportement\Cache;


class AppCache {
    private $cache;
    
    
    function __construct(\Psr\SimpleCache\CacheInterface $cache) {
        $this->cache = $cache;
    }

    public function cache($key,$callable) {
        $value= $this->cache->get($key);
        if(!$value){
            ob_start() ;
            $callable();
            $value= ob_get_clean();
            $this->cache->set($key, $value) ;
        }
        return $value;
    }
    
    
    
}
