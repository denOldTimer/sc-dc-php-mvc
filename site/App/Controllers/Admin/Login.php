<?php

namespace App\Controllers\Admin;

use App\Core\Controller;
use App\Core\View;

/**
 *  Construction
 */
class Login extends Controller
{
  protected function before()
  {
  }

  public function indexAction($args = array())
  {
    $viewPath = PATH_VIEW;
    $viewPath .= ucfirst($args['namespace']);
    $viewName = strtolower($args['controller']);

    //echo ($viewPath . '<br /> ');


    //echo ('in the login -> index action method <br>');

    View::render('f0', $viewPath, $viewName);
  }

  protected function after()
  {
  }

  //END-Class
}