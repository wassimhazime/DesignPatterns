<?php

/*
 * Le pattern observateur définit une relation
  entre les objets de type un à plusieurs, de
  façon que, lorsqu’un objet change d’état,
  tous ce qui en dépendent en soient informés
  et soient mis à jour automatiquement

 */

/**
 * Description of EventTest
 *
 * @author wassime
 */
use DesignPatterns\Comportement\Observateur\Event\Emitter;

class EventTest extends \PHPUnit\Framework\TestCase {

    public function testsimple() {
        $emitter = Emitter::getEvent();
        $emitter->on("testsimple", function ($arg) {
            echo "testsimple $arg";
        });
        $param = "testparam set";




        $this->expectOutputString("testsimple $param");
        $emitter->emit("testsimple", $param);
    }

    public function testFunctionOn() {
        $emitter = Emitter::getEvent();


        $emitter->on("call", function ($arg) {
            echo " call " . ($arg+0) . " => ";
        });

        $emitter->on("call", function ($arg) {
            echo " call " . ($arg+1) . " => ";
        });
        $emitter->on("call", function ($arg) {
            echo " call " . ($arg+2)  . " => ";
        });
        $emitter->on("call", function ($arg) {
            echo " call " . ($arg+3) . " => ";
        });

       $this->expectOutputString(' call 4 =>  call 3 =>  call 2 =>  call 1 => ');

        $emitter->emit("call", 1);
    }

    public function testFunctionOnPriority() {
        $emitter = Emitter::getEvent();


        $emitter->on("callpriority", function ($arg) {
            echo " call " . ($arg+0) . " => ";
        },0);

        $emitter->on("callpriority", function ($arg) {
            echo " call " . ($arg+1) . " => ";
        },1);
        $emitter->on("callpriority", function ($arg) {
            echo " call " . ($arg+2)  . " => ";
        },2);
        $emitter->on("callpriority", function ($arg) {
            echo " call " . ($arg+3) . " => ";
        },3);

       $this->expectOutputString(' call 1 =>  call 2 =>  call 3 =>  call 4 => ');

        $emitter->emit("callpriority", 1);
    }
    
    public function testFunctionOnPriorityfinal() {
        $emitter = Emitter::getEvent();


        $emitter->on("callpriorityfinal", function ($arg) {
            echo "| traitement de $arg avec priority 0 |";
        },0,true);

        $emitter->on("callpriorityfinal", function ($arg) {
            echo "| traitement de $arg avec priority 1 |";
        },1,true);
        $emitter->on("callpriorityfinal", function ($arg) {
            echo "| traitement de $arg avec priority 2 |";
        },2,true);
        $emitter->on("callpriorityfinal", function ($arg) {
            echo "| traitement de $arg avec priority 3 |";
        },3,true);

       $this->expectOutputString('| traitement de 1 avec priority 0 |');

        $emitter->emit("callpriorityfinal", 1);
    }
    
    public function testFunctionOncePriority() {
        $emitter = Emitter::getEvent();


        $emitter->once("calloncepriorityfinal", function ($arg) {
            echo "| traitement de $arg avec priority 0 |";
        },0,true);

        $emitter->once("calloncepriorityfinal", function ($arg) {
            echo "| traitement de $arg avec priority 1 |";
        },1,true);
        $emitter->once("calloncepriorityfinal", function ($arg) {
            echo "| traitement de $arg avec priority 2 |";
        },2,true);
        $emitter->once("calloncepriorityfinal", function ($arg) {
            echo "| traitement de $arg avec priority 3 |";
        },3,true);

       $this->expectOutputString('| traitement de 1 avec priority 0 |');

        $emitter->emit("calloncepriorityfinal", 1);
    }
    
    
}
