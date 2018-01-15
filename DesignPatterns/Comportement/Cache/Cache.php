<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace DesignPatterns\Comportement\Cache;

/**
 * Description of Cache
 *
 * @author wassime
 */
use Psr\SimpleCache\CacheInterface;
class Cache implements CacheInterface {
    private $cache=[];
    public function clear(): bool {
        
    }

    public function delete($key): bool {
        
    }

    public function deleteMultiple($keys): bool {
        
    }

    public function get($key, $default = null) {
        if(isset( $this->cache[$key])){
        return  $this->cache[$key];
        
        }
        return null;
        
    }

    public function getMultiple($keys, $default = null){
        return null;
        
    }

    public function has($key): bool {
        
    }

    public function set($key, $value, $ttl = null): bool {
        $this->cache[$key]=$value;
        return true;
    }

    public function setMultiple($values, $ttl = null): bool {
        
    }

}
