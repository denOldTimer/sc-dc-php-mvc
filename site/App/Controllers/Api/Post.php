<?php

namespace App\Controllers\Api;

use App\Core\Controller;
use App\Core\View;

/**
 *  Api - Read - test namespaces
 */
class Post extends Controller
{
  protected function before()
  {
  }

  public function indexAction($args = array())
  {
    echo ('in the post -> index action method <br>');
    var_dump($args);
  }

  public function readAction($args = array())
  {
    echo ('in the post -> read action method <br>');
    var_dump($args);
  }

  protected function after()
  {
  }

  //END-Class
}