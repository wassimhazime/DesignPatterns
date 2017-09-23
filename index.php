<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        require_once './vendor/autoload.php';
        use DesignPatterns\Singleton;
        use DesignPatterns\Fluent;
       
        use DesignPatterns\Factory;
        use DesignPatterns\Facade;
echo ' <hr><h1> Injection de dépendances</h1> =>  de passer directement '
        . 'au constructeur l\'objet que l\'on souhaite '
        . 'utiliser    __construct($A, $adress) liaison des class en construct <br>';   

echo ' <hr><h1>Singleton</h1> * 1000 permet d\'avoir une '
. 'classe qui sera instanciée qu\'une seule fois tout au '
        . 'long de notre application<br>';

        Singleton::getObject(); Singleton::getObject(); Singleton::getObject(); Singleton::getObject(); Singleton::getObject(); Singleton::getObject();

         
         
echo ' <hr><h1> Fluent</h1> '." Fluent est de permettre d'écrire du "
        . "code de manière plus lisible comme on le dirait à l'oral".'  <br>';         
      echo(new Fluent())->select("A","b")->from(" table1")->where(" id=3")->query() ."<br>"; 
      echo(new Fluent())->from(" table2","client")->query()."<br>";
      echo(new Fluent())->from(" table2","client")->where("id>5")->where("id<9")."<br>";
      echo(new Fluent())->from(" table2","client")."<br>";
      
echo ' <hr><h1>Factory</h1> Le principe est d\'avoir'
      . ' une classe qui va se charger de créer les objets dont on a besoin.  ';   
            echo ' <h2>Factory</h2>   Factory::getA()*2 <br>'; 
                    Factory::getA()->afiche();Factory::getA()->afiche();
            echo ' <h2> Factory</h2>   Factory::getB()*2 <br>';         
                     Factory::getB()->afiche();
                     Factory::getB()->afiche();   
      
echo ' <hr><h1>Facade</h1>  Comme son nom l\'indique le principe des Facade est de créer une classe qui 
         servira de façade à une autre classe en rendant la classe appellable via des appels statiques. <br>  ';  

echo Facade::select("A","b")->from(" table1")->where(" id=3")->query() ."<br>"; 
     ?>
    </body>
</html>
