<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of main
 *
 * @author Wassim Hazime
 */
namespace DesignPatterns\Structure\decorator;
class sql implements InterfaceApp{


    

    public function select($table) {
        return "select * from $table";
    }

}
