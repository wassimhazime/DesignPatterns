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
namespace DesignPatterns\Structure\Adapter;
interface InterfaceMath {
    function somme2(int $a,int $b):int ;
    function somme3(int $a,int $b,int $c):int ;
}
