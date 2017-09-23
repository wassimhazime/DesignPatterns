<?php
namespace DesignPatterns;

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Singleton
 *
 * @author Wassim Hazime
 */
class Singleton {
  
    private  $name;
    private static $get;
    private function __construct(string $name) {
        $this->name = $name;
    }

   public static function getObject(){
       if (self::$get==null) {
          self::$get =new  Singleton('wassim');
          echo 'instance object <br>';
           
       }
       return self::$get;
       
       
       
   }
    
}
