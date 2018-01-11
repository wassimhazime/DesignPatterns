<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace DesignPatterns\Structure\Proxy;

/**
 * Description of AccessData
 *
 * @author wassime
 */
class AccessData implements InerfaceAccessData{
 
    public function getData(): string {
        return "le nom est wassim hazime";
    }

}
