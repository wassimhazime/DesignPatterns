<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of CommandTest
 *
 * @author wassime
 */
use DesignPatterns\Comportement\Command\Actions;
use DesignPatterns\Comportement\Command\Invoqueur;

class CommandTest extends \PHPUnit\Framework\TestCase{
    
    public function testCommand() {
        
        $action = new Actions();
        $invoqure=new Invoqueur($action);
        
        $invoqure->setCommands("122", new \DesignPatterns\Comportement\Command\Command122());
        $invoqure->setCommands("2323", new \DesignPatterns\Comportement\Command\Command2323());
        $invoqure->setCommands("233", new \DesignPatterns\Comportement\Command\Command233());
        $invoqure->setCommands("342", new \DesignPatterns\Comportement\Command\Command342);
        
        $this->assertEquals(
                  $action->action1()
                .$action->action2()
                .$action->action2(),             $invoqure->run("122"));
        $this->assertEquals(
                 $action->action2()
                .$action->action3()
                .$action->action2()
                .$action->action3(),             $invoqure->run("2323"));
        $this->assertEquals(
                $action->action2()
                .$action->action3()
                .$action->action3(),             $invoqure->run("233"));
        $this->assertEquals(
                $action->action3().
                $action->action4().
                $action->action2(),              $invoqure->run("342"));
         $this->assertEquals(
                          "",              $invoqure->run("empty"));
        
    }
}
