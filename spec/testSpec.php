<?php

use DesignPatterns\Event;

describe(Event ::class, function () {

    it("singlton", function () {
        $ob = Event::getEvent();

        expect($ob)->toBeAnInstanceOf(Event::class);
        expect($ob)->toBe(Event::getEvent());
        //expect($ob)->toBe(new Event);
    });
    it("singlton2", function () {
        $ob = Event::getEvent();

        expect($ob)->toBeAnInstanceOf(Event::class);
        expect($ob)->toBe(Event::getEvent());
        //expect($ob)->toBe(new Event);
    });
    
    describe("method on", function () {
    it("on emit", function () {
        $ob = Event::getEvent();
        $testvar = "";

        $ob->on("oktest", function () use(&$testvar) {
            $testvar = "ok";
            return "oktest";
        });
        $ob->emit("oktest");
        expect($testvar)->toBe("ok");
    });
});
});

