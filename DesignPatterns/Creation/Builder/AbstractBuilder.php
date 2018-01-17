<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace DesignPatterns\Creation\Builder;

/**
 * Description of AbstractBuilder
 *
 * @author wassime
 */
abstract class AbstractBuilder {
    
    protected $pc=[];
    
    function setCpu($cpu):self {
        $this->pc["cpu"] = $cpu;
        return $this;
    }

    function setRam($ram):self {
        $this->pc["ram"] = $ram;
         return $this;
    }

    function setDisque_dur($disque_dur):self {
        $this->pc["disque_dur"] = $disque_dur;
         return $this;
    }

    function setEcran($ecran):self {
        $this->pc["ecran"] = $ecran;
         return $this;
    }

    function setCarte_mere($carte_mere) :self{
        $this->pc["carte_mere"] = $carte_mere;
         return $this;
    }
    
  function builde():ProduitPC {
       
         return new ProduitPC( 
                 $this->pc["cpu"], 
                 $this->pc["ram"],
                 $this->pc["disque_dur"], 
                 $this->pc["ecran"], 
                 $this->pc["carte_mere"] );
    }
    
}
