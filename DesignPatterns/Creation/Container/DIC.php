<?php

/*

  Aujourd'hui nous allons parler d'un pattern assez particulier :
 *  Le conteneur d'injecteur de dépendance.
 *  Le but de ce pattern et d'être 
 * capable de résoudre les dépendances d'un objet simplement..
 */

/**
 * Description of DIC
 *
 * @author wassime
 */

namespace DesignPatterns\Creation\Container;

use Psr\Container\ContainerInterface;

class DIC implements ContainerInterface, InterfaceSetDIC, InterfaceGetNew {

    private static $DIC = null;
    private $object = [];
    private $callable = [];
    private $automatisation = true;

    private function __construct($automatisation) {
        $this->automatisation = $automatisation;
    }

    public static function buildContainer($automatisation = true): self {
        if (self::$DIC == null) {
            self::$DIC = new self($automatisation);
        }

        return self::$DIC;
    }

    ////////////////////////////////////////////////////////////////////////////

    public function get($id) {

        if (!$this->has($id)) {
            $this->object[$id] = $this->Automatisation($id);
        }
        if (is_callable($this->object[$id])) {
            $this->callable[$id] = $this->object[$id];
            $this->object[$id] = ($this->object[$id])(self::$DIC);
        }
        return $this->object[$id];
    }

    public function has($id): bool {
        return isset($this->object[$id]);
    }

    public function getNew($id) {
        if (isset($this->callable[$id])) {
            return (($this->callable[$id])(self::$DIC));
        }
        return $this->Automatisation(get_class($this->get($id)));
    }

    public function set($id, $object) {
        $this->object[$id] = $object;
    }

    ///////////////////////////////////////////////////////////////////////////// 

    private function Automatisation($id) {
        if (!$this->automatisation) {
            throw new \Exception($id . " is Not object to Container DIC");
        }
        if (class_exists($id)) {
            $reflected_class = new \ReflectionClass($id); // On récupère la class depuis la chaine de caractère

            if ($reflected_class->isInstantiable()) { // On a bien une class instanciable (et pas une interface)
                return $this->reflectionClass($reflected_class);
            } else {
                throw new \Exception($id . " is not an instanciable Class");
            }
        } else {

            throw new \Exception($id . " is Not class ");
        }
    }

    private function reflectionClass(\ReflectionClass $reflected_class) {
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

            $object = $reflected_class->newInstanceArgs($constructor_parameters);
        } else {
            // sinon on peut directement instancier notre objet à vide.
            $object = $reflected_class->newInstance();
        }

        return $object;
    }

}
