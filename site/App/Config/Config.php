<?php

namespace App\Config;

class Config
{
  private $routes = array();
  private $dBParams = array();


  public function __construct()
  {
  }


  public function setRoutes()
  {
    $this->routes = include_once('routes.php');
  }
  public function getRoutes()
  {
    return $this->routes;
  }

  public function setDbParams()
  {
    $this->dBParams = include_once('database.php');
  }
  public function getDbParams()
  {
    return $this->dBParams;
  }







  //END-Class
}