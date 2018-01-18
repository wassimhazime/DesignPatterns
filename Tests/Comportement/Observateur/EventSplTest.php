<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of EventSplTest
 *
 * @author wassime
 */
use DesignPatterns\Comportement\Observateur\EventSpl\ExempleModel;
use DesignPatterns\Comportement\Observateur\EventSpl\Observateur\Journal;
use DesignPatterns\Comportement\Observateur\EventSpl\Observateur\MessageFlash;


class ob implements \SplObserver {
    
    public function update(\SplSubject $subject): void {
        echo 'test traitement';
    }

}


class EventSplTest extends \PHPUnit\Framework\TestCase {

    public function testSimpleattach() {
        $model = new ExempleModel();
        //Observateur
        $journal=new Journal();
        $msgflash=new MessageFlash();
        
        $model->attach($journal);
        $model->attach($msgflash);;



        $this->expectOutputString("Journal a été notifié ! "
                . "Nouvelle valeur de l'attribut"
                . " <strong>data</strong> :"
                . " ajouter produit dell<br>"
                . "MessageFlash a été notifié !"
                . " Nouvelle valeur de l'attribut "
                . "<strong>data</strong> :"
                . " ajouter produit dell<br>");

        $model->setData("ajouter produit dell");
    }

    
     public function testSimpledetach() {
        $model = new ExempleModel();
          //Observateur
        $journal=new Journal();
        $msgflash=new MessageFlash();
        
        $model->attach($journal);
        $model->attach($msgflash);
        
        $model->detach($journal);


        $this->expectOutputString(""
                . "MessageFlash a été notifié !"
                . " Nouvelle valeur de l'attribut "
                . "<strong>data</strong> :"
                . " ajouter produit dell<br>");

        $model->setData("ajouter produit dell");
    }
    
    
      public function testnewObservateurlocal() {
        $model = new ExempleModel();
          //Observateur
        $journal=new Journal();
        $msgflash=new MessageFlash();
        $oblocal=new ob();
        
        
        $model->attach($oblocal);
        
        $model->attach($journal);
        $model->attach($msgflash);
        
        $model->detach($journal);
        $model->detach($msgflash);


        $this->expectOutputString('test traitement');

        $model->setData("ajouter produit dell");
    }
}
