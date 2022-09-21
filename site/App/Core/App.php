<?php

namespace App\Core;

use App\Config\Routes;



class App
{
  public function __construct($routes)
  {

    self::router($routes);
  }


  private static function router($routes)
  {
    $router = new Router();

    foreach ($routes as $route => $params) {
      $router->addRoute($route, $params);
    };



    //echo '<br /> PATH_HOST  :: ' . $_SERVER['HTTP_HOST'];
    //echo '<br /> REQUEST_URI  :: ' . $_SERVER['REQUEST_URI'];



    //PARSING URL
    $tokens = htmlspecialchars($_SERVER['REQUEST_URI'], ENT_QUOTES);
    //var_dump($tokens);

    //DISPATCH
    $router->dispatch($tokens);
  }

  //END-Class
}