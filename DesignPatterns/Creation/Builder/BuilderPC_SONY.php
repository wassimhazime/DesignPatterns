<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace DesignPatterns\Creation\Builder;

/**
 * Description of BuilderPC
 *
 * @author wassime
 */
  class BuilderPC_SONY extends AbstractBuilder {
    
      
    function __construct() {
                 $this->pc["cpu"]="amd";
                 $this->pc["ram"]="2gb";
                 $this->pc["disque_dur"]="sony 40gb";
                 $this->pc["ecran"]="sony 15pove";
                 $this->pc["carte_mere"]   ="sony 900"; 
    }
    
 
    
}
