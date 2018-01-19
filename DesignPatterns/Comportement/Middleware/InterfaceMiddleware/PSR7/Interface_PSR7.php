<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 *
 * @author wassime
 */
namespace DesignPatterns\Comportement\Middleware\InterfaceMiddleware\PSR7;

use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Message\ResponseInterface;
interface Interface_PSR7 {
  public function __invoke(ServerRequestInterface $request,ResponseInterface $response, callable $next):ResponseInterface ; 
}