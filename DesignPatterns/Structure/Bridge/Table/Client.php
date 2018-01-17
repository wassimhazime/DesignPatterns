<?php

/*
 Le Design Pattern permet d'isoler le lien entre
une couche de haut niveau et celle de bas niveau.

 */

namespace DesignPatterns\Structure\Bridge\Table;

/**
 * Description of Client
 *
 * @author wassime
 */
class Client implements InterfaceTable{
    private $db;
    private $table;
    public function __construct(\DesignPatterns\Structure\Bridge\DB\InterfaceDB $db) {
        $this->db=$db;
        $this->table= " client";
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
