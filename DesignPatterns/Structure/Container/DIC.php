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

namespace DesignPatterns\Structure\Container;

use Psr\Container\ContainerInterface;

class DIC implements ContainerInterface, InterfaceSetDIC {

    private static $DIC = null;
    private $object = [];

    private function __construct() {
        
    }

    public static function buildContainer(): self {
        if (self::$DIC == null) {
            self::$DIC = new self();
        }
      
        return self::$DIC;
    }

    ////////////////////////////////////////////////////////////////////////////

    public function get($id) {

        if (!$this->has($id)) {
            $this->setAutomatisation($id);
        }
        return $this->object[$id];
    }

    public function has($id): bool {
        return isset($this->object[$id]);
    }

    public function set($id, $object = null) {
        if ($object == null) {
            $this->setAutomatisation($id);
        } elseif (is_callable($object)) {
            $this->setCallable($id, $object);
        } else {
            $this->setSingleton($id, $object);
        }
    }

    ///////////////////////////////////////////////////////////////////////////// 

    private function setAutomatisation($id) {
        if (class_exists($id)) {
            $reflected_class = new \ReflectionClass($id); // On récupère la class depuis la chaine de caractère

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
                    $this->object[$id] = $reflected_class->newInstanceArgs($constructor_parameters);
                } else {
                    // sinon on peut directement instancier notre objet à vide.
                    $this->object[$id] = $reflected_class->newInstance();
                    
                }
            } else {
                throw new \Exception($id . " is not an instanciable Class");
            }
        } else {

            throw new \Exception("not is class");
        }
    }

    private function setCallable($id, callable $callable) {
        $this->object[$id] = $callable(self::$DIC);
    }

    private function setSingleton($id, $object) {
        $this->object[$id] = $object;
    }

}
