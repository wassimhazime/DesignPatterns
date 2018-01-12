<?php

/*
 *  Le Design Pattern permet d'isoler le lien entre
une couche de haut niveau et celle de bas niveau.

 */

namespace DesignPatterns\Structure\Bridge;

/**
 * Description of Produit
 *
 * @author wassime
 */
class Produit implements InterfaceTable{
    private $db;
    private $table;
    public function __construct(InterfaceDB $db) {
        $this->db=$db;
        $this->table= " Produit";
    }

    public function delete() {
        return "delete ".$this->table ." in ".$this->db->exe();
    }

    public function insert() {
         return "insert ".$this->table ." in ".$this->db->exe();  
    }

    public function update() {
          return "update ".$this->table ." in ".$this->db->exe();
    }

}
