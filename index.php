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
        
        //conteneur d'injecteur de dépendance
        use DesignPatterns\DIC;
        
        use DesignPatterns\Factory\A;
        use DesignPatterns\Factory\B;
        
        
        
        use DesignPatterns\decorator\sql;
        use DesignPatterns\decorator\DecoratorWhere;
        use DesignPatterns\decorator\DecoratorJoin;
        use DesignPatterns\Event;
        
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






// J'explique à mon conteneur comment résoudre B
$container = new DIC(); 
// J'explique à mon container comment obtenir une instance de A
$container->set('A', function($container){
    return new A("wasim",30);
});

// J'explique à mon container comment obtenir une instance de B
$container->set('B', function($c){
    // Je peux utiliser le container pour résoudre A
    return new B($c->get('A'),"ttt");
});

// Maintenant si je veux une instance de B

$container->get('B')->afiche();



 echo ' <hr><h1>décorer</h1>  "décorer" un objet en y ajoutant des méthodes ou '
. '       en modifiant le comportement de méthodes existantes <br>  ';  
 
 
 
 
 $sql=new sql();  
 echo $sql->select("produit") ."<br>";
 
 
 $sql=new sql(); 
 $sql=new DecoratorJoin($sql);
 $sql=new DecoratorWhere($sql);

 echo $sql->select("produit",55) ."  | avec decorator DecoratorJoin DecoratorWhere <br>";
 echo 'and  add functon affiche <br>';
 $sql->affiche("produit",55);
 echo '<br> ';
 
 
 echo 'event';
 $event = Event::getEvent();
 
 
 $event->on("test", function(){
     echo "test on";
 } );
 
 $event->emit("test");
 $event->emit("test");
 $event->emit("test");
 
   
 
 
 
 
     ?>
        
        
        
        
        
    
    </body>
</html>
