<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace DesignPatterns\Comportement\Strategy;

/**
 * Description of Format_strong
 *
 * @author wassime
 */
class Format_strong implements IStyle{
    //put your code here
    public function textFormat($txt): string {
         return "<strong>  $txt </strong>  Strategy STRONG";
    }

}
