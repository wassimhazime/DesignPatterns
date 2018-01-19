<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of midd_dispatsher
 *
 * @author wassime
 */

namespace DesignPatterns\Comportement\Middleware;

use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Message\ResponseInterface;
use DesignPatterns\Comportement\Middleware\InterfaceMiddleware\PSR15\RequestHandlerInterface;
use DesignPatterns\Comportement\Middleware\InterfaceMiddleware\PSR15\MiddlewareInterface;

class Midd_dispatsher implements RequestHandlerInterface {

    //singltone

    private static $self = null;

    public static function Dispatsher(): self {
        if (self::$self == null) {
            self::$self = new self();
        }
  self::$self = new self();///test
        return self::$self;
    }

    private function __construct() {
        
    }

    private function __clone() {
        
    }

    /////////////////////////////////////////////////////////////   

    private $middlwares = [];
    private $response = null;

    public function pipe($midd) {
        $this->middlwares[] = $midd;
    }

    public function next(ServerRequestInterface $request, ResponseInterface $respons): ResponseInterface {
       
            $this->response = $respons;
        



        if (count($this->middlwares)) {
            $middlwars = array_shift($this->middlwares);



            if ($middlwars instanceof MiddlewareInterface) {

                return $middlwars->process($request, $this);
                
            } elseif (is_callable($middlwars)) {
                return $middlwars($request, $respons, [$this, 'next']);
            } else {

                throw new \Exception(" pipe object is not Middlwars");
            }
        } else {
            return $respons;
        }
    }

    public function handle(ServerRequestInterface $request): ResponseInterface {
        return $this->next($request, $this->response);
    }

}
