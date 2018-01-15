<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of CacheTest
 *
 * @author wassime
 */
use Symfony\Component\Cache\Simple\FilesystemCache;

class CacheTest extends \PHPUnit\Framework\TestCase {

    public function testCache() {
        $cache = new DesignPatterns\Comportement\Cache\Cache();



        $app = new \DesignPatterns\Comportement\Cache\AppCache($cache);





        $cache1 = $app->cache("wassim", function () {
            echo 'wassim cache';
        });



        $cache2 = $app->cache("wassim", function () {
            echo '       wassim new     ';
        });

        $this->assertEquals("wassim cache", $cache1);
        $this->assertEquals("wassim cache", $cache2);
    }

    public function testCacheUseSymfonyComponentCache() {
/// https://symfony.com/doc/current/components/cache.html


        $cache = new FilesystemCache();
        $app = new \DesignPatterns\Comportement\Cache\AppCache($cache);





        $cache1 = $app->cache("wassim", function () {
            echo 'wassim cache';
        });



        $cache2 = $app->cache("wassim", function () {
            echo '       wassim new     ';
        });

        $this->assertEquals("wassim cache", $cache1);
        $this->assertEquals("wassim cache", $cache2);
    }

    public function testMockCache() {

        $cache = $this->getMockBuilder(\DesignPatterns\Comportement\Cache\Cache::class)->setMethods(['get'])->getMock();
        $cache->expects($this->once())->method('get')->willReturn("wassim mock");

        $app = new \DesignPatterns\Comportement\Cache\AppCache($cache);

        $cache1 = $app->cache("wassim", function () {
            echo 'wassim cache';
        });





        $this->assertEquals("wassim mock", $cache1);
    }

    public function testMockNotCache() {

        $cache = $this->getMockBuilder(\DesignPatterns\Comportement\Cache\Cache::class)->setMethods(['get'])->getMock();
        $cache->expects($this->once())->method('get')->willReturn(null);

        $app = new \DesignPatterns\Comportement\Cache\AppCache($cache);

        $cache1 = $app->cache("wassim", function () {
            echo 'wassim cache';
        });





        $this->assertEquals('wassim cache', $cache1);
    }

}
