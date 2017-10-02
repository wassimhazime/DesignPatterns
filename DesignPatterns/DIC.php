<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace DesignPatterns;

/**
 * Description of conteneur d'injecteur de dépendance
 *
 * @author Wassim Hazime
 */
class DIC {

    private $registry = [];
    private $instances = [];

    public function set($key, Callable $resolver) {
        $this->registry[$key] = $resolver;
    }

    public function get($key) {
        if (isset($this->factories[$key])) {
            return $this->factories[$key]();
        }
        if (!isset($this->instances[$key])) {
            if (isset($this->registry[$key])) {
                $this->instances[$key] = $this->registry[$key]($this);
            } else {
                throw new Exception($key . " n'est pas dans mon conteneur :(");
            }
        }
        return $this->instances[$key];
    }

    private function resolve($key) {
        $reflected_class = new ReflectionClass($key); // On récupère la class depuis la chaine de caractère
        if ($reflected_class->isInstantiable()) { // On a bien une class instanciable (et pas une interface)
            $constructor = $reflected_class->getConstructor(); // On récupère le constructeur
            if ($constructor) {
                // Si le constructeur existe alors on va analyser ses paramètres
                $parameters = $constructor->getParameters();
                $constructor_parameters = [];
                foreach ($parameters as $parameter) {
                    if ($parameter->getClass()) {
                        $constructor_parameters[] = $this->get($parameter->getClass()->getName());
                    } else {
                        $constructor_parameters[] = $parameter->getDefaultValue();
                    }
                }
                return $reflected_class->newInstanceArgs($constructor_parameters);
            } else {
                // sinon on peut directement instancier notre objet à vide.
                return $reflected_class->newInstance();
            }
        } else {
            throw new Exception($key . " is not an instanciable Class");
        }
    }

}
