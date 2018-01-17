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

class DIC implements ContainerInterface, InterfaceSetDIC {

    private static $DIC = null;
    private $object = [];
    private $automatisation=true;

    private function __construct($automatisation) {
        $this->automatisation=$automatisation;
    }

    public static function buildContainer($automatisation=true): self {
        if (self::$DIC == null) {
            self::$DIC = new self($automatisation);
        }
      
        return self::$DIC;
    }

    ////////////////////////////////////////////////////////////////////////////

    public function get( $id) {

        if (!$this->has($id)) {
            
            $this->setAutomatisation($id);
        }
        return $this->object[$id];
    }

    public function has( $id): bool {
        return isset($this->object[$id]);
    }

    public function set( $id, $object = null) {
        
        if (is_callable($object)) {
            
            $this->setCallable($id, $object);
        } else {
            $this->setSingleton($id, $object);
        }
    }

    ///////////////////////////////////////////////////////////////////////////// 

    private function setAutomatisation($id) {
        if (!$this->automatisation) {
           throw new \Exception($id .  " is Not object to Container DIC"); 
        }
        if (class_exists($id)) {
            $reflected_class = new \ReflectionClass($id); // On récupère la class depuis la chaine de caractère

            if ($reflected_class->isInstantiable()) { // On a bien une class instanciable (et pas une interface)
                $this->object[$id]= $this->reflectionClass($reflected_class);
               
            } else {
                throw new \Exception($id . " is not an instanciable Class");
            }
        } else {

            throw new \Exception($id .  " is Not class ");
            
           }
    }

    private function setCallable($id, callable $callable) {
        $this->object[$id] = $callable(self::$DIC);
    }

    private function setSingleton($id, $object) {
        $this->object[$id] = $object;
    }
    //////////////////////////////////////////////////////////////////////////////////
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
                    
                    $object= $reflected_class->newInstanceArgs($constructor_parameters);
                } else {
                    // sinon on peut directement instancier notre objet à vide.
                    $object = $reflected_class->newInstance();
                    
                } 
                
                return $object;
    }

}
