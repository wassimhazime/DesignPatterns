<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of EventPsrTest
 *
 * @author wassime
 */
use DesignPatterns\Comportement\Observateur\EventPsr\EventManager;
use DesignPatterns\Comportement\Observateur\EventPsr\Event;

class EventPsrTest extends \PHPUnit\Framework\TestCase {

    public function testsimple() {
        $ev = new EventManager();

         $call1 = function ($event) {
            echo " traitement 1 => " . $event->getParam(0) . " " . $event->getParam(1) . " ";
        };
        $call2 = function ($event) {
            echo " traitement 2 => " . $event->getParam(0) . " " . $event->getParam(1) . " ";
        };


        $ev->attach("ok", $call1);
        $ev->attach("ok", $call2);



        $event = new Event();
        $event->setName("ok");
        $event->setParams(["data1", "data2"]);

        $this->expectOutputString(" traitement 1 => data1 data2 "
                . " traitement 2 => data1 data2 ");


        $ev->trigger($event);
    }

    public function testsimplepriority() {
        $ev = new EventManager();

         $call1 = function ($event) {
            echo " traitement 1 => " . $event->getParam(0) . " " . $event->getParam(1) . " ";
        };
        $call2 = function ($event) {
            echo " traitement 2 => " . $event->getParam(0) . " " . $event->getParam(1) . " ";
        };


        $ev->attach("ok", $call1, 6);
        $ev->attach("ok", $call2, 1);



        $event = new Event();
        $event->setName("ok");
        $event->setParams(["data1", "data2"]);

        $this->expectOutputString(" traitement 2 => data1 data2 "
                . " traitement 1 => data1 data2 ");


        $ev->trigger($event);
    }

    public function testsimpleprioritystopPropagation() {
        $ev = new EventManager();

        $call1 = function ($event) {
            echo " traitement 1 => " . $event->getParams()[0] . " " . $event->getParams()[1] . " ";
        };
        $call2 = function ($event) {
            $event->stopPropagation(true);
            echo " traitement 2 => " . $event->getParams()[0] . " " . $event->getParams()[1] . " ";
        };


        $ev->attach("ok", $call1, 6);
        $ev->attach("ok", $call2, 0);



        $event = new Event();
        $event->setName("ok");
        $event->setParams(["data1", "data2"]);

        $this->expectOutputString(" traitement 2 => data1 data2 "
        );


        $ev->trigger($event);
    }

    public function testsimpleeventstring() {
        $ev = new EventManager();

        $call1 = function ($event) {
            echo " traitement 1 => " . $event->getParams()[0] . " " . $event->getParams()[1] . " ";
        };
        $call2 = function ($event) {
            $event->stopPropagation(true);
            echo " traitement 2 => " . $event->getParams()[0] . " " . $event->getParams()[1] . " ";
        };


        $ev->attach("ok", $call1, 6);
        $ev->attach("ok", $call2, 0);





        $this->expectOutputString(" traitement 2 => data1 data2 "
        );


        $ev->trigger("ok", null, ["data1", "data2"]);
    }

    public function testsimple_clearListeners() {
        $ev = new EventManager();

        $call1 = function ($event) {
            echo " traitement 1 => " . $event->getParams()[0] . " " . $event->getParams()[1] . " ";
        };
        $call2 = function ($event) {
            $event->stopPropagation(true);
            echo " traitement 2 => " . $event->getParams()[0] . " " . $event->getParams()[1] . " ";
        };


        $ev->attach("ok", $call1, 6);
        $ev->attach("ok", $call2, 0);


        $ev->clearListeners("ok");



        $event = new Event();
        $event->setName("ok");
        $event->setParams(["data1", "data2"]);

        $this->expectOutputString("");


        $ev->trigger($event);
    }
    
     public function testsimple_detach() {
        $ev = new EventManager();

        $call1 = function ($event) {
            echo " traitement 1 => " . $event->getParam(0) . " " . $event->getParam(1) . " ";
        };
        $call2 = function ($event) {
            echo " traitement 2 => " . $event->getParam(0) . " " . $event->getParam(1) . " ";
        };


        $ev->attach("ok", $call1);
        $ev->attach("ok", $call2);



        $event = new Event();
        $event->setName("ok");
        $event->setParams(["data1", "data2"]);
        
        $ev->detach("ok", $call1);

        $this->expectOutputString( " traitement 2 => data1 data2 ");


        $ev->trigger($event);
    }

}
