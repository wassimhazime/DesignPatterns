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

      ////http psr 7
      use GuzzleHttp\Psr7\ServerRequest;
      use GuzzleHttp\Psr7\Response;
      use function Http\Response\send;
///Creation
      use DesignPatterns\Creation\Singleton\Singleton;
      /////////////////////////////////////
      use DesignPatterns\Creation\Factory\Factory;
      use DesignPatterns\Creation\Factory\A;
      use DesignPatterns\Creation\Factory\B;
      ////////////////////////////////////
///Comportement
      //////////////////// simple (javascript) ///////////////
      use DesignPatterns\Comportement\Event\Emitter;
      ///////////////////  PSR                ////////////////
      use DesignPatterns\Comportement\EventPsr\EventManager;
      ////////////////////   spl             /////////////////
      use DesignPatterns\Comportement\EventSpl\Observee;
      use DesignPatterns\Comportement\EventSpl\Observer1;
      use DesignPatterns\Comportement\EventSpl\Observer2;
      ///////////////////////////////////////////////////
      use DesignPatterns\Comportement\Fluent\Fluent;
      //////////////////////////////////////
      use DesignPatterns\Comportement\Strategy\Strategy;
////Structure
      ///////////////////////////////////////////
      use DesignPatterns\Structure\Facade\Facade;
      ///////////////////////////////////////////
      use DesignPatterns\Structure\DIC;  //conteneur d'injecteur de dépendance
      //////////////////////////////////////////
      use DesignPatterns\Structure\decorator\sql;
      use DesignPatterns\Structure\decorator\DecoratorWhere;
      use DesignPatterns\Structure\decorator\DecoratorJoin;

////++++++++++++++++++++++++++++++++++++++++++++++++++//
/// Handler error
      (new \Whoops\Run)
              ->pushHandler(new \Whoops\Handler\PrettyPageHandler)
              ->register();



      echo ' <hr><h1> Injection de dépendances</h1> =>  de passer directement '
      . 'au constructeur l\'objet que l\'on souhaite '
      . 'utiliser    __construct($A, $adress) liaison des class en construct <br>';


// J'explique à mon conteneur comment résoudre B
      $container = new DIC();
// J'explique à mon container comment obtenir une instance de A
      $container->set('A', function($container) {
          return new A("wasim", 30);
      });

// J'explique à mon container comment obtenir une instance de B
      $container->set('B', function($c) {
          // Je peux utiliser le container pour résoudre A
          return new B($c->get('A'), "ttt");
      });

// Maintenant si je veux une instance de B

      $container->get('B')->afiche();



      echo ' <hr><h1>Singleton</h1> * 1000 permet d\'avoir une '
      . 'classe qui sera instanciée qu\'une seule fois tout au '
      . 'long de notre application<br>';

      Singleton::getObject();
      Singleton::getObject();
      Singleton::getObject();
      Singleton::getObject();
      Singleton::getObject();
      Singleton::getObject();



      echo ' <hr><h1> Fluent</h1> ' . " Fluent est de permettre d'écrire du "
      . "code de manière plus lisible comme on le dirait à l'oral" . '  <br>';
      echo(new Fluent())->select("A", "b")->from(" table1")->where(" id=3")->query() . "<br>";
      echo(new Fluent())->from(" table2", "client")->query() . "<br>";
      echo(new Fluent())->from(" table2", "client")->where("id>5")->where("id<9") . "<br>";
      echo(new Fluent())->from(" table2", "client") . "<br>";



      echo ' <hr><h1>Factory (usine)</h1> Le principe est d\'avoir'
      . ' une classe qui va se charger de créer les objets dont on a besoin.  ';

      echo ' <h2>Factory</h2>   Factory::getA()*2 <br>';
      Factory::getA()->afiche();
      Factory::getA()->afiche();
      echo ' <h2> Factory</h2>   Factory::getB()*2 <br>';
      Factory::getB()->afiche();
      Factory::getB()->afiche();
      echo ' <h2> Factory</h2>   Factory::get("A") Factory::get("B")  <br>';
      Factory::get("A")->afiche();
      Factory::get("B")->afiche();



      echo ' <hr><h1>Facade</h1>  Comme son nom l\'indique le principe des Facade est de créer une classe qui 
         servira de façade à une autre classe en rendant la classe appellable via des appels statiques. <br>  ';


      Facade::setObjects(new Fluent());



      echo Facade::select("A", "b")->from(" table1")->where(" id=3")->query() . "<br>";
      echo Facade::aficheA();
      echo Facade::aficheB();










      echo ' <hr><h1>décorer</h1>  "décorer" un objet en y ajoutant des méthodes ou '
      . '       en modifiant le comportement de méthodes existantes <br>  ';




      $sql = new sql();
      echo $sql->select("produit") . "<br>";


      $sql = new sql();
      $sql = new DecoratorJoin($sql);
      $sql = new DecoratorWhere($sql);

      echo $sql->select("produit", 55) . "  | avec decorator DecoratorJoin DecoratorWhere <br>";
      echo 'and  add functon affiche <br>';
      $sql->affiche("produit", 55);
      echo '<br> ';


      echo '<hr> <hr><h1>observeurs  event </h1>'
      . 'Le pattern observateur définit une relation
         entre les objets de type un à plusieurs, de
           façon que, lorsqu’un objet change d’état,
             tous ce qui en dépendent en soient informés
         et soient mis à jour automatiquement
         '
      . '<br>'
      . ''
      . '  Lorsque certaines action-clefs sont'
      . ' effectuées sur notre application nous allons émettre un évènement.'
      . ' On pourra ensuite observer le déclenchement de ces évènements et effectuer'
      . ' un traitement particulier.<br><br><br><br><br><br>  ';



      $event = Emitter::getEvent();


//        $event->on("add", function($arg) {
//            echo "add 1 post data base $arg <br>";
//        },1);
//        $event->on("add", function($arg) {
//            echo "add 0 post view $arg  <br>";
//        });
//        $event->on("add", function($arg) {
//            echo "add -3 post databas2 $arg  <br>";
//        },-3);



      $event->once("modifier", function($arg1, $arg2) {
          echo "modifier once  $arg1 , $arg2 ";
      });
      $event->on_final("modifier", function($arg1, $arg2) {
          echo "modifier on_final1 $arg1 , $arg2 ";
      }, 1, 4);
      $event->on_final("modifier", function($arg1, $arg2) {
          echo "modifier on_final2 $arg1 , $arg2 ";
      }, 2, 4);
      $event->on("modifier", function($arg1, $arg2) {
          echo "modifier on $arg1 , $arg2 ";
      }, 4, 4);


      $event->emit("add", 666);

      $event->emit("add", "hhh");

      $event->emit("modifier", 1, "tets arg");
      $event->emit("modifier", 2, "tets arg");
      $event->emit("modifier", 3, "tets arg");
      $event->emit("modifier", 4, "tets arg");
      $event->emit("modifier", 5, "tets arg");


      echo "<hr> <hr><h1>le pattern EventSpl en php</h1>  : vous avez un objet 
        observé et un ou plusieurs autre(s) objet(s) qui l'observe(nt).
        Lorsque telle action survient,
        vous allez prévenir tous les objets qui l'observent. <br><br><br><br>";


      $observee = new Observee;
      $observee->attach(new Observer1); // Ajout d'un observateur.
      $observee->attach(new Observer2); // Ajout d'un autre observateur.



      $observee->setNom('Victor'); // On modifie le nom pour voir si les classes observatrices ont bien été notifiées.
      $observee->setNom('wassim');


      echo "<hr> <hr><h1>EventManager psr</h1>  : vous avez un objet 
        observé et un ou plusieurs autre(s) objet(s) qui l'observe(nt).
        Lorsque telle action survient,
        vous allez prévenir tous les objets qui l'observent. <br><br><br><br>";




      $ev = new EventManager();
      $call1 = function ($a, $b) {
          echo 'test call1 =>>' . $a . $b . "<br>";
      };
      $call2 = function ($a, $b) {
          echo 'test call2 =>>' . $a . $b . "<br>";
      };

      $ev->attach("psr", $call1, 2);
      $ev->attach("psr", $call2, 2);
      $ev->attach("psr", function ($a, $b) {
          echo 'test psr ==>' . $a . $b . "<br>";
      }, 5);
      // $ev->clearListeners("psr");
      //$ev->trigger("psr","h", ["1T","1R"]);
      $ev->detach("psr", $call2);
      $ev->trigger("psr", "h", ["2T", "2R"]);





      echo "<hr> <hr><h1>Séparer ses algorithmes : le pattern Strategy</h1> 
           ous avez une classe dédiée à une tâche spécifique.
           Dans un premier temps, celle-ci effectue une opération 
           suivant un algorithme bien précis. Cependant, avec le temps, 
           cette classe sera amenée à évoluer, et elle suivra plusieurs algorithmes,
           tout en effectuant la même tâche de base <br><br><br><br>";




      $stratigy = new Strategy("wassim");

      $stratigy->setFormat(new \DesignPatterns\Comportement\Strategy\Format_h1);
      echo $stratigy->affiche();

      $stratigy->setFormat(new \DesignPatterns\Comportement\Strategy\Format_h2);
      echo $stratigy->affiche();

      $stratigy->setFormat(new \DesignPatterns\Comportement\Strategy\Format_strong);
      echo $stratigy->affiche();

      echo "<hr> <hr><h1>http psr7</h1> 
           <br><br><br><br>";


//      $req = ServerRequest::getUriFromGlobals();
//      $res = new Response();
//
//      $path = $req->getPath();
//      $res->getBody()->write("path de url est " . $path);
//
//      send($res);
      
      ?>






  </body>
</html>
