<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of MiddlewareTest
 *
 * @author wassime
 */
use DesignPatterns\Comportement\Middleware\Midd_dispatsher;
use GuzzleHttp\Psr7\Response;
use GuzzleHttp\Psr7\ServerRequest;
use DesignPatterns\Comportement\Middleware\Middleware_PSR7\Midd_affiche_wassim;
use DesignPatterns\Comportement\Middleware\Middleware_PSR7\Midd_affiche_awa;
use DesignPatterns\Comportement\Middleware\Middleware_PSR7\Midd_add_balise_h1;
use DesignPatterns\Comportement\Middleware\Middleware_PSR15\Midd_affiche_PSR15;
use DesignPatterns\Comportement\Middleware\Middleware_PSR15\Midd_affiche_PSR15_2;
use Tuupola\Middleware\CorsMiddleware;
use Middlewares\Utils\Factory;
use Middlewares\Utils\Dispatcher;

class MiddlewareTest extends \PHPUnit\Framework\TestCase {

//      public function testSinglton() {
//        
//        $dis1= Midd_dispatsher::Dispatsher();
//        $dis1->pipe(new Midd_affiche_wassim);
//        $dis1->pipe(new Midd_add_balise_h1);
//        $dis1->pipe(new Midd_affiche_awa);
//        
//         $dis2= Midd_dispatsher::Dispatsher();
//         $this->assertEquals(true,$dis1===$dis2);
//        
//    }
//    

    public function testnextRuternResponse() {

        $dis = Midd_dispatsher::Dispatsher();
        $dis->pipe(new Midd_affiche_wassim);
        $request = ServerRequest::fromGlobals();
        $respons = new Response();

        $res = $dis->next($request, $respons);


        $this->assertEquals(true, $res instanceof Response);
    }

    public function testResponse() {
        $request = ServerRequest::fromGlobals();
        $respons = new Response();

        $dis = Midd_dispatsher::Dispatsher();
        $dis->pipe(new Midd_affiche_wassim);


        $res = $dis->next($request, $respons);
        $this->assertEquals(' affiche wassim ', (string) $res->getBody());
    }

    public function testOrdreMidd() {
        $request = ServerRequest::fromGlobals();
        $respons = new Response();

        $dis = Midd_dispatsher::Dispatsher();
        $dis->pipe(new Midd_add_balise_h1);     // ||
        $dis->pipe(new Midd_affiche_wassim);    // ||
        $dis->pipe(new Midd_affiche_awa);       // \/


        $res = $dis->next($request, $respons);
        $this->assertEquals('<h1> affiche wassim  affiche awa </h1>', (string) $res->getBody());
    }

    public function testPSR15() {
        $request = ServerRequest::fromGlobals();
        $respons = new Response();

        $dis = Midd_dispatsher::Dispatsher();
        $dis->pipe(new Midd_affiche_PSR15);



        $res = $dis->next($request, $respons);
        $this->assertEquals(' affiche PSR 15 1 ', (string) $res->getBody());
    }

    public function testPSR15andpsr7() {
        $request = ServerRequest::fromGlobals();
        $respons = new Response();

        $dis = Midd_dispatsher::Dispatsher();
        $dis->pipe(new Midd_add_balise_h1);     // ||
        $dis->pipe(new Midd_affiche_wassim);    // ||
        $dis->pipe(new Midd_affiche_awa);       // \/
        $dis->pipe(new Midd_affiche_PSR15);



        $res = $dis->next($request, $respons);
        $this->assertEquals('<h1> affiche wassim  affiche awa  affiche PSR 15 1 </h1>', (string) $res->getBody());
    }

    public function test2PSR15() {
        $request = ServerRequest::fromGlobals();
        $respons = new Response();

        $dis = Midd_dispatsher::Dispatsher();


        $dis->pipe(new Midd_affiche_PSR15);
        $dis->pipe(new Midd_affiche_PSR15_2);




        $res = $dis->next($request, $respons);
        $this->assertEquals(' affiche PSR 15 2  affiche PSR 15 1 ', (string) $res->getBody());
    }

    public function testOrdreMiddFactory() {

        $request = Factory::createServerRequest();
        $respons = Factory::createResponse();

        $dis = Midd_dispatsher::Dispatsher();
        $dis->pipe(new Midd_add_balise_h1);     // ||
        $dis->pipe(new Midd_affiche_wassim);    // ||
        $dis->pipe(new Midd_affiche_awa);       // \/


        $res = $dis->next($request, $respons);
        $this->assertEquals('<h1> affiche wassim  affiche awa </h1>', (string) $res->getBody());
    }

    public function testDispatcher() {

        $dispatcher = new Dispatcher([
            new \DesignPatterns\Comportement\Middleware\Middleware_PSR15\Midd_affiche_PSR15_interop1,
            new \DesignPatterns\Comportement\Middleware\Middleware_PSR15\Midd_affiche_PSR15_interop2
        ]);

        $response = $dispatcher->dispatch(Factory::createServerRequest());

        $this->assertEquals(' affiche PSR 15 interop 1  affiche PSR 15 interop 1 ', (string) $response->getBody());
    }
    
    
    
    
  
    
    

}
